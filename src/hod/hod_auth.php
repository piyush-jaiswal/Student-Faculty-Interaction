<?php 

    session_start();
    
    if(!isset($_SESSION['userClass']) || $_SESSION['userClass'] != 'hod') {
        header('Location: /unauthorized.php');
    }

?>