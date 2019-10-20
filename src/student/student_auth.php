<?php 

    session_start();
    
    if(!isset($_SESSION['userClass']) || $_SESSION['userClass'] != 'student') {
        header('Location: /unauthorized.php');
    }

?>