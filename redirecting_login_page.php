<?php 
    //For directing according to the userClass when logging in

    session_start();
    $userClass = $_SESSION['userClass'];


    //Checking user class for redirection
    if($userClass == 'student')
        header('Location: /student/student_home_page.php');

    else if($userClass == 'hod')
        header('Location: /hod/hod_home_page.php');

    else if($userClass == 'faculty') 
        header('Location: /faculty/faculty_home_page.php');

    else 
        exit("You are not registered!");

?>