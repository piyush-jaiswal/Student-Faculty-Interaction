<?php 

    session_start();
    //$_SESSION['userClass'] = 'student'; //To check if authorization is working or not.

    require '../database_connection.php';
    require 'student_auth.php';
    include('../classes_and_functions.php');

    $userID = $_SESSION['userID'];
    $session = $_SESSION['session'];

    $courseHandout_ob = new courseHandout();

    if(isset($_GET['course'])) {
        $courseCode = $courseHandout_ob->stripBadChars($_GET['course']);
    }
    $_SESSION['courseCode'] = $courseCode;
    require 'student_auth_courseEnrolled.php';  //Comment this out to show the function of this file
    
    $result = $courseHandout_ob->getCourseTitle($courseCode, $session, $db);

    foreach($result as $row) {
        $courseName = $row['courseName'];
        $sem = $row['sem'];
    }

    $courseTopicAndStatus = $courseHandout_ob->getTopics($courseCode, $session, $db); // contains the topics and topicStatus

    $name = $_SESSION['name'];
    $notifications = $_SESSION['notifications'];

    $collapse_counter = 1; //For collapsable subtopics
    $rating_id_counter = 1; //For rating id

?>



<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/rate-covered-topics.css" rel="stylesheet">
    <link href="../css/student_star_rating.css" rel="stylesheet">
</head>

<?php include('../header.php'); ?>

            <div class="page-content-border">
                <div class="page-content">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <hr style="border-top: 1px solid darkslategrey; margin-top: 0px; margin-bottom: 0px;" />
                            </div>
                        </div>

                        <div class="container-fluid" style="background-color: #ef4424;">
                            <div class="course-header">
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <h3 id="code"><b><?php echo $courseCode; ?></b>
                                        <h3>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <h3 id="title"><b><?php echo $courseName; ?></b></h3>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <h4 class="session-info"><b>Sem:</b> <?php echo $sem; ?></h4>
                                    <h4 class="session-info"><b>Session:</b> <?php echo $session; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <hr style="border-top: 1px solid darkslategrey; margin-top: 0px; margin-bottom: 0px;" />
                            </div>
                        </div>

                        <div class="topics-wrapper">
                            <div class="container-fluid">
                                <div class="col-md-12 col-sm-12">
                                    <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">

                                        <?php 
                                            foreach($courseTopicAndStatus as $row) { 

                                                //Getting the topic links if any
                                                $topicLinks = $courseHandout_ob->getTopicLink($courseCode, $session, $row['topic'], $db);

                                                //Getting the course subtopics if any                           
                                                $courseSubtopicAndStatus = $courseHandout_ob->getSubtopics($courseCode, $session, $row['topic'], $db);

                                                  $hasSubtopics = false;
                                                  $topic_ratingDisable = ""; //for the rating system of topic to be disabled or enabled
                                                  
                                                  $checkedRating1 = "";
                                                  $checkedRating2 = "";
                                                  $checkedRating3 = "";
                                                  $checkedRating4 = "";
                                                  $checkedRating5 = "";

                                                //Checking to see if the topic has subtopics
                                                if(mysqli_num_rows($courseSubtopicAndStatus) > 0) {
                                                    $hasSubtopics = true;
                                                    $topic_ratingDisable = "disabled";
                                                }

                                                //If the topic is not covered
                                                if($row['topicStatus'] == "notChecked")
                                                    $topic_ratingDisable = "disabled";

                                                //Getting rating of topic
                                                $topicRating = $courseHandout_ob->student_getTopicRating($courseCode, $session, $row['topic'], $userID, $db);
                                                
                                                $topicRated = 'false'; //To store whether the topic has been rated previously or not.
                                                //If topic is already rated
                                                if(mysqli_num_rows($topicRating) > 0) {
                                                    
                                                    foreach($topicRating as $rating) {
                                                        $topicRating = $rating['topicRating'];
                                                        $topicRated = 'true';
                                                    }

                                                //Setting the corresponding rating to checked using variable variables
                                                ${"checkedRating" . $topicRating} = "checked";

                                                }
                                                
                                        ?>

                                        <div class="topic_and_subtopic">
                                            <div class="panel-heading" role="tab">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="panel-title">

                                                        <div class="checkbox"><input class="topic_input" type="checkbox" name="topics_covered" value="checked" 
                                                        onclick="callUpdateTopicStatus('<?php echo $row['topic']; ?>', '<?php echo $courseCode; ?>', this)" 
                                                        <?php echo $row['topicStatus']; ?> disabled ></div>

                                                        <h3 class="topic-heading"><b><?php echo $row['topic']; ?></b></h3>

                                                        <p>Related Links: <i>&nbsp; 
                                                            <?php
                                                                //Checking to print related links of topics if present
                                                                if(mysqli_num_rows($topicLinks) > 0) { 
                                                                        foreach($topicLinks as $link) {
                                                                            $temp = $link['topicLink'];
                                                                            echo "<a href=$temp target='_blank'>$temp</a>&emsp;";
                                                                        }
                                                                }
                                                            ?>
                                                        </i></p>
                                                    </div>
                                                </div>

                                                <!--topic rating-->
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="rating-system">
                                                        <form>
                                                            <span class="starRating">

                                                                <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="5" 
                                                                onclick="callRateTopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', 
                                                                '<?php echo $userID; ?>', '<?php echo $topicRated; ?>', this)" <?php echo $topic_ratingDisable; ?> <?php echo $checkedRating5; ?> >
                                                                <label for="rating<?php echo $rating_id_counter++; ?>">5</label>

                                                                <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="4" 
                                                                onclick="callRateTopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', 
                                                                '<?php echo $userID; ?>', '<?php echo $topicRated; ?>', this)" <?php echo $topic_ratingDisable; ?> <?php echo $checkedRating4; ?> >
                                                                <label for="rating<?php echo $rating_id_counter++; ?>">4</label>

                                                                <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="3" 
                                                                onclick="callRateTopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', 
                                                                '<?php echo $userID; ?>', '<?php echo $topicRated; ?>', this)" <?php echo $topic_ratingDisable; ?> <?php echo $checkedRating3; ?> >
                                                                <label for="rating<?php echo $rating_id_counter++; ?>">3</label>

                                                                <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="2" 
                                                                onclick="callRateTopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', 
                                                                '<?php echo $userID; ?>', '<?php echo $topicRated; ?>', this)" <?php echo $topic_ratingDisable; ?> <?php echo $checkedRating2; ?> >
                                                                <label for="rating<?php echo $rating_id_counter++; ?>">2</label>

                                                                <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="1" 
                                                                onclick="callRateTopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', 
                                                                '<?php echo $userID; ?>', '<?php echo $topicRated; ?>', this)" <?php echo $topic_ratingDisable; ?> <?php echo $checkedRating1; ?> >
                                                                <label for="rating<?php echo $rating_id_counter++; ?>">1</label>

                                                            </span>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--end of topic rating-->


                                                <div class="col-md-1 col-sm-1">
                                                    <?php 
                                                        //Checking to include drop-down button or not based on whether the topic has subtopics
                                                        if($hasSubtopics == true) {
                                                            echo "<h5 style='text-align:center;'>Subtopics</h5>
                                                            <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse$collapse_counter' aria-expanded='true' aria-controls='#collapse$collapse_counter'>
                                                                <img class='dropdown' src='../images/down.png' alt='dropdown' />
                                                            </a>";
                                                        }   
                                                    ?>
                                                </div>
                                            </div>

                                            <?php 
                                            //Checking to see if the topic has subtopics to display it and its related links
                                                if(mysqli_num_rows($courseSubtopicAndStatus) > 0) { 
                                            ?>
                                            
                                            <div class="col-md-12 col-sm-12">
                                            <div id="collapse<?php echo $collapse_counter++; ?>" class="panel-collapse collapse" role="tabpanel">
                                            <hr style="border-top: 1px dashed black" />
                                            <div class="panel-body">
                                            
                                            <?php
                                                foreach($courseSubtopicAndStatus as $subtopics) {
                                                    $subtopicLinks = $courseHandout_ob->getSubtopicLink($courseCode, $session, $row['topic'], $subtopics['subtopic'], $db);
                                                    
                                                $checkedRating1 = "";
                                                $checkedRating2 = "";
                                                $checkedRating3 = "";
                                                $checkedRating4 = "";
                                                $checkedRating5 = "";

                                                $subtopic_ratingDisable = "";
                                                //If the subtopic is not covered
                                                if($subtopics['subtopicStatus'] == "notChecked")
                                                    $subtopic_ratingDisable = "disabled";

                                                //Getting rating of subtopic
                                                $subtopicRating = $courseHandout_ob->student_getSubtopicRating($courseCode, $session, $row['topic'], $subtopics['subtopic'], $userID, $db);
                                                
                                                $subtopicRated = 'false'; //To store whether the subtopic has been rated previously or not.
                                                //If subtopic is already rated
                                                if(mysqli_num_rows($subtopicRating) > 0) {
                                                    
                                                    foreach($subtopicRating as $rating) {
                                                        $subtopicRating = $rating['subtopicRating'];
                                                        $subtopicRated = 'true';
                                                }

                                                //Setting the corresponding rating to checked using variable variables
                                                ${"checkedRating" . $subtopicRating} = "checked";

                                                }
                                            ?>

                                            <div class="col-md-6 col-sm-6">

                                                <div class="checkbox"><input class="subtopic_input" type="checkbox" name="subtopics_covered" value="covered"
                                                onclick="callUpdateSubtopicStatus('<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                '<?php echo $courseCode; ?>', this)" <?php echo $subtopics['subtopicStatus']; ?> disabled ?></div>

                                                <h4 class="topic-heading"><b><?php echo $subtopics['subtopic']; ?></b></h4>

                                               <div class="links">
                                                    <p>Related Links: <i>&nbsp; 
                                                    <?php
                                                        if(mysqli_num_rows($subtopicLinks) > 0) { 
                                                                foreach($subtopicLinks as $sublink) {
                                                                    $temp = $sublink['subtopicLink'];
                                                                    echo "<a href=$temp target='_blank'>$temp</a>&emsp;";
                                                                }
                                                        }
                                                    ?>
                                                    </i></p>
                                                </div>
                                            </div>

                                            <!--subtopic rating-->
                                            <div class="col-md-6 col-sm-6">
                                                <div class="rating-system">
                                                    <form>
                                                        <span class="starRating">

                                                            <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="5" 
                                                            onclick="callRateSubtopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                            '<?php echo $userID; ?>', '<?php echo $subtopicRated; ?>', this)" <?php echo $subtopic_ratingDisable; ?> <?php echo $checkedRating5; ?> >
                                                            <label for="rating<?php echo $rating_id_counter++; ?>">5</label>

                                                            <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="4" 
                                                            onclick="callRateSubtopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                            '<?php echo $userID; ?>', '<?php echo $subtopicRated; ?>', this)" <?php echo $subtopic_ratingDisable; ?> <?php echo $checkedRating4; ?> >
                                                            <label for="rating<?php echo $rating_id_counter++; ?>">4</label>

                                                            <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="3" 
                                                            onclick="callRateSubtopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                            '<?php echo $userID; ?>', '<?php echo $subtopicRated; ?>', this)" <?php echo $subtopic_ratingDisable; ?> <?php echo $checkedRating3; ?> >
                                                            <label for="rating<?php echo $rating_id_counter++; ?>">3</label>

                                                            <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="2" 
                                                            onclick="callRateSubtopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                            '<?php echo $userID; ?>', '<?php echo $subtopicRated; ?>', this)" <?php echo $subtopic_ratingDisable; ?> <?php echo $checkedRating2; ?> >
                                                            <label for="rating<?php echo $rating_id_counter++; ?>">2</label>

                                                            <input id="rating<?php echo $rating_id_counter; ?>" type="radio" name="rating" value="1" 
                                                            onclick="callRateSubtopics('<?php echo $courseCode; ?>', '<?php echo $row['topic']; ?>', '<?php echo $subtopics['subtopic']; ?>', 
                                                            '<?php echo $userID; ?>', '<?php echo $subtopicRated; ?>', this)" <?php echo $subtopic_ratingDisable; ?> <?php echo $checkedRating1; ?> >
                                                            <label for="rating<?php echo $rating_id_counter++; ?>">1</label>

                                                        </span>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--end of subtopic rating-->

                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <hr style="border-top: 0.5px dotted grey" />
                                                </div>
                                            </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <hr style="border-top: 2px solid black" />
                                    </div>
                                </div>
                               
                            </div>
                            <!--end of topic_and_subtopic -->   

                             <?php } ?>  

                                </div>
                                <!-- end of #accordion -->
                                    
                                </div>
                            </div>
                            <!-- end of container -->
                        </div>
                        <!-- end of topic-wrap -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script type ="text/javascript"  src="../js/jquery-3.1.1.min.js"> </script>
    <script type ="text/javascript" src="../js/bootstrap.min.js"> </script>
    <script type ="text/javascript" src="../js/rate-covered-topics.js"> </script>
    <script type ="text/javascript" src="../js/header.js"></script>
    <script type="text/javascript" src="../js/student_modal.js"></script>
    <script type="text/javascript" src="../js/student_course_handout.js"></script>
</body>

</html>

<?php mysqli_close($db); ?>