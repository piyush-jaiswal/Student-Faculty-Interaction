<?php 

    session_start();
    //$_SESSION['userClass'] = 'student'; //To check if authorization is working or not.

    require '../database_connection.php';
    require 'faculty_auth.php';
    include('../classes_and_functions.php');
    
    $userID = $_SESSION['userID'];
    $session = $_SESSION['session'];
    
    $faculty_ob = new faculty();
    $courses = $faculty_ob->courseConducting($userID, $session, $db);
    
    $result = array();
    foreach($courses as $row) {
        $result[] = $row;
    }
    $_SESSION['courseConducting'] = $result;

    $name = $faculty_ob->getUsername($userID, $db);
    $_SESSION['name'] = $name;
    $researchArea = $faculty_ob->getResearch($userID, $db);
    $emailID = $faculty_ob->getEmail($userID, $db);

    //Getting new notifications if any
    $checkUser_ob = new userClass();
    $notifications = $checkUser_ob->checkNotifications($userID, $db);
    $_SESSION['notifications'] = $notifications;

    //Setting the value of home and back options
    $home = "#";
    $back = "#";

    mysqli_close($db);

?>


<!DOCTYPE HTML>
<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Faculty Interaction | Home</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/header.css" rel="stylesheet">
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/modal.css" rel="stylesheet">
    </head>

<?php include('../header.php'); ?>

        
    <div class="page-content">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="col-md-9 col-sm-9">
                    <div class="courses-projects">
                        <div>
                            <h2 id="heading">My Courses:</h2>
                        </div>

                        <?php foreach($courses as $row) { ?>

                        <div class="course-title">
                            <button class="accordion"><?php echo $row['courseName']; ?></button>
                            <div class="panel">
                                <ul>
                                    <li><a href="faculty_rate-covered-topics.php?course=<?php echo $row['courseCode']; ?>">View course handout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

                <div class="col-md-3 col-sm-3">
                    <div class="profile">
                        <div>
                            <h3 id="my-profile">Profile</h3>
                        </div>
                        <div><img id="user-face" src="../images/vu.png" /></div>
                        <div id="profile-description">
                            <h4><b><?php echo $name ?></b></h4>
                            <h4>Employee id: <i><?php echo $userID; ?></i></h4>
                            <h4><i>Specialisation & Research feild </i></h4>
                            <?php echo $researchArea;  ?>
                            <h4>Email Id - <a href="#"><?php echo $emailID ?></a></h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="../js/jquery-3.1.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
    <script src="../js/header.js" type="text/javascript"> </script>
    <script src="../js/common.js" type="text/javascript"> </script>
    <script type="text/javascript" src="../js/faculty_modal.js"></script>
    <script type="text/javascript" src="../js/acceptMeetingRequest.js"></script>
</body>

</html>