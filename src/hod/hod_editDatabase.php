<?php 

    session_start();

    require '../database_connection.php';
    require 'hod_auth.php'; 
    include('../classes_and_functions.php');

    if(isset($_POST['receiver']) && isset($_POST['subject']) && isset($_POST['message'])) {

        $userDetails_ob = new userDetails();
        $userClass_ob = new userClass();

        $recipient = $_POST['receiver'];
        $recipient = urldecode($recipient); //Removing the encoding sent through ajax
        $recipient = strtoupper($recipient); //to query the database
        $recipient = $userDetails_ob->getUserID($recipient, $db); //getting the userID of the recipient

        //If there is no such recipient
        if($recipient == "") {
            echo false;
            return;
        } 
            

        $subject = $_POST['subject'];
        $reason = $_POST['message'];
        $sender = $_SESSION['userID'];

        $subject = urldecode($subject); //Removing the encoding sent through ajax
        $reason = urldecode($reason); //Removing the encoding sent through ajax

        $userClass_ob->scheduleMeeting($sender, $recipient, $subject, $reason, $db);

        echo true;

    }

?>