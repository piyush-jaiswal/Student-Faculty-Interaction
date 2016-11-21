<?php 

    session_start();

    $userID = "U101114FCS222"; //Hope this will be made available to us through mooodle login.

    require 'database_connection.php';
    include('classes_and_functions.php');
    
    $userClass_ob = new userClass();
    $userClass = $userClass_ob->checkUser($userID, $db);
    $session = "2015-2016"; //This will be set according to the current date. For now because of the data given constant value.

    $_SESSION['userID'] = $userID;
    $_SESSION['userClass'] = $userClass;
    $_SESSION['session'] = $session;

    mysqli_close($db);

    header('Location: redirecting_login_page.php');

    //Session will end when return to moodle is clicked.
?>