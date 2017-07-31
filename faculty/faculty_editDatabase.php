<?php 

    session_start();

    require '../database_connection.php';
    require 'faculty_auth.php'; 
    include('../classes_and_functions.php');

    //For meeting requests
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


    //To update topics or subtopics
    if(isset($_POST['method'])) {

        $courseHandout_ob = new courseHandout();
        $faculty_ob = new faculty();
        $method = $courseHandout_ob->stripBadChars($_POST['method']);

        //if topic is updated
        if($method == 'topicStatus_Update') {

            require 'faculty_auth_courseConducting.php';  //Comment this out to show the function of this file

            if(isset($_POST['topic']) && isset($_POST['value']) && isset($_POST['courseCode'])) {
               
                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $topicStatus = $courseHandout_ob->stripBadChars($_POST['value']);
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $faculty_ob->topicStatus_Update($courseCode, $session, $topic, $topicStatus, $db);
            }
        }


        //If subtopic is updated
        else if($method == 'subtopicStatus_Update') {

            require 'faculty_auth_courseConducting.php';  //Comment this out to show the function of this file

            if(isset($_POST['topic']) && isset($_POST['subtopic']) && isset($_POST['value']) && isset($_POST['courseCode'])) {
                
                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $subtopic = $_POST['subtopic'];
                $subtopicStatus = $courseHandout_ob->stripBadChars($_POST['value']);
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $faculty_ob->subtopicStatus_Update($courseCode, $session, $topic, $subtopic, $subtopicStatus, $db);
            }
        }


        //if topicFrequency is to be seen
        if($method == 'topic_getFrequency') {

            if(isset($_POST['topic']) && isset($_POST['courseCode'])) {
               
                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $faculty_ob->topic_getFrequency($courseCode, $session, $topic, $db);
            }
        }



        //if subtopicFrequency is to be seen
        if($method == 'subtopic_getFrequency') {

            if(isset($_POST['topic']) && isset($_POST['courseCode']) && isset($_POST['subtopic'])) {
               
                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $subtopic = $_POST['subtopic'];
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $faculty_ob->subtopic_getFrequency($courseCode, $session, $topic, $subtopic, $db);
            }
        }


    }

?>