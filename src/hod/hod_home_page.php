<?php 

    session_start();
    //$_SESSION['userClass'] = 'student'; //To check if authorization is working or not.

    require '../database_connection.php';
    require 'hod_auth.php'; //This will be faculty_auth when the faculty home page is made
    include('../classes_and_functions.php');
    
    $userID = $_SESSION['userID'];
    $session = $_SESSION['session'];
    
    $hod_ob = new hod();
    $courseIncharge = $hod_ob->courseIncharge($userID, $session, $db);
    
    //Storing the courses HOD is incharge of in session
    $result = array();
    foreach($courseIncharge as $row) {
        $result[] = $row;
    }
    $_SESSION['courseIncharge'] = $result;

    $name = $hod_ob->getUsername($userID, $db);
    $_SESSION['name'] = $name;
    $researchArea = $hod_ob->getResearch($userID, $db);
    $emailID = $hod_ob->getEmail($userID, $db);

    //Getting new notifications if any
    $checkUser_ob = new userClass();
    $notifications = $checkUser_ob->checkNotifications($userID, $db);
    $_SESSION['notifications'] = $notifications;

    //Getting the names of the faculty under the hod who are conducting the course
    $student_ob = new student();
    $facultyNames = array();
    foreach($courseIncharge as $row) {
       $facultyNames[] = $student_ob->getfacultyName($row['courseCode'], $db);
    } 

    //Getting the courses which the hod is conducting
    $courseConducting = $hod_ob->courseConducting($userID, $session, $db);
    $result2 = array();
    foreach($courseConducting as $row) {
        $result2[] = $row;
    }
    $_SESSION['courseConducting'] = $result2;

    //Setting the value of home and back options
    $home = "#";
    $back = "#";

    mysqli_close($db);

?>

<!DOCTYPE html>
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

                                <div id="coordinating" style="background-color:#ef4424; padding: 10px; font-size:20px; color: white; width: 25%; word-wrap: break-word;">Coordinator-</div>

                                <?php foreach($courseIncharge as $index=>$row) { ?>

                                <div class="course-title">
                                    <button class="accordion"><?php echo $row['courseName']; ?></button>
                                    <div class="panel">
                                        <ul>
                                            <li>Faculty: <a href="#"><?php echo $facultyNames[$index]; ?></a></li>
                                            <li><a href="hod_rate-covered-topics.php?course=<?php echo $row['courseCode']; ?>">View course handout</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <?php } ?>


                                <div id="teaching" style="background-color:#ef4424; padding: 10px; font-size:20px; color: white; width: 25%; word-wrap: break-word;">Instructor-</div>

                                <?php foreach($courseConducting as $row) { ?>

                                <div class="course-title">
                                    <button class="accordion"><?php echo $row['courseName']; ?></button>
                                    <div class="panel">
                                        <ul>
                                            <li><a href="../faculty/faculty_rate-covered-topics.php?course=<?php echo $row['courseCode']; ?>">View course handout</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="col-md-3 col-sm-3">
                            <div class="profile">
                                <div>
                                    <h3 id="my-profile">Profile</h3>
                                </div>
                                <div><img id="user-face" src="../images/pgupta.png" /></div>
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
            <script src="../js/common.js" type "text/javascript"> </script>
            <script type="text/javascript" src="../js/hod_modal.js"></script>
            <script type="text/javascript" src="../js/acceptMeetingRequest.js"></script>
</body>

</html>