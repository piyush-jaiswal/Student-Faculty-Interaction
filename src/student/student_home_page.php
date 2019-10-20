<?php 

    session_start();
    //$_SESSION['userClass'] = 'faculty'; //To check if authorization is working or not.

    require '../database_connection.php';
    require 'student_auth.php'; //This will be faculty_auth when the faculty home page is made
    include('../classes_and_functions.php');
    
    $userID = $_SESSION['userID'];
    $session = $_SESSION['session'];
    
    $student_ob = new student();
    $courses = $student_ob->coursesEnrolledIn($userID, $session, $db);
    
    $result = array();
    foreach($courses as $row) {
        $result[] = $row;
    }
    $_SESSION['courseEnrolled'] = $result;

    $name = $student_ob->getUsername($userID, $db);
    $_SESSION['name'] = $name;
    $emailID = $student_ob->getEmail($userID, $db);

    //Getting new notifications if any
    $checkUser_ob = new userClass();
    $notifications = $checkUser_ob->checkNotifications($userID, $db);
    $_SESSION['notifications'] = $notifications;

    //Getting the names of the faculty that are teaching the courses
    $facultyNames = array();
    foreach($courses as $row) {
       $facultyNames[] = $student_ob->getfacultyName($row['courseCode'], $db);
    }

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

                                <?php foreach($courses as $index=>$row) { ?>

                                <div class="course-title">
                                    <button class="accordion"><?php echo $row['courseName']; ?></button>
                                    <div class="panel">
                                        <ul>
                                            <li>Faculty: <a href="#"><?php echo $facultyNames[$index]; ?></a></li>
                                            <li><a href="student_rate-covered-topics.php?course=<?php echo $row['courseCode']; ?>">View course handout</a></li>
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
                                <div><img id="user-face" src="../images/rjt.jpg" /></div>
                                <div id="profile-description">
                                    <h4><b><?php echo $name; ?></b></h4>
                                    <h4>Enrollment no: <i><?php echo $userID; ?></i></h4>
                                    <h4>Course: <i>B.Tech/M.Tech</i></h4>
                                    <h4>Session: <i>2016-17</i></h4>
                                    <h4>Email Id - <a href="#"><?php echo $emailID; ?></a></h4>
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
            <script type="text/javascript" src="../js/student_modal.js"></script>
</body>

</html>