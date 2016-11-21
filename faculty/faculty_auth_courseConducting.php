<?php 

    session_start();

    if(!isset($_SESSION['courseConducting']) || !isset($_SESSION['courseCode'])) {
        header('Location: /unauthorized.php');
    }

    else {
        $courses = $_SESSION['courseConducting'];
        $courseCode = $_SESSION['courseCode'];
        $f = false;

        foreach($courses as $row) {
            if($row['courseCode'] == $courseCode) {
                $f = true;
                break;
            }
        }

        if($f == false) {
            header('Location: /unauthorized.php');
        }
    }

?>