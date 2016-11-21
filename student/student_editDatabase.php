<?php 

    session_start();

    require '../database_connection.php';
    require 'student_auth.php'; 
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


    //For rating system
    if(isset($_POST['method'])) {

        //echo 'yoasdasdas';
        require 'student_auth_courseEnrolled.php';  //Comment this out to show the function of this file

        $courseHandout_ob = new courseHandout();
        $student_ob = new student();
        $method = $courseHandout_ob->stripBadChars($_POST['method']);

        //If topic is rated
        if($method == 'rateTopics') {

            if(isset($_POST['courseCode']) && isset($_POST['topic']) && isset($_POST['enrollmentID']) && isset($_POST['topicRating']) && isset($_POST['topicRated'])) {

                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $enrollmentID = $courseHandout_ob->stripBadChars($_POST['enrollmentID']);
                $topicRating = $courseHandout_ob->stripBadChars($_POST['topicRating']);
                $previouslyRated = $courseHandout_ob->stripBadChars($_POST['topicRated']);

                $student_ob->rateTopics($courseCode, $session, $topic, $enrollmentID, $topicRating, $previouslyRated, $db);
            }

        }

        //If subtopic is rated
        else if($method == 'rateSubtopics') {
            
            if(isset($_POST['courseCode']) && isset($_POST['topic']) && isset($_POST['subtopic']) && isset($_POST['enrollmentID']) && isset($_POST['subtopicRating']) && isset($_POST['subtopicRated'])) {

                $session = $_SESSION['session'];
                $topic = $_POST['topic'];
                $subtopic = $_POST['subtopic'];
                $courseCode = $courseHandout_ob->stripBadChars($_POST['courseCode']);
                $enrollmentID = $courseHandout_ob->stripBadChars($_POST['enrollmentID']);
                $subtopicRating = $courseHandout_ob->stripBadChars($_POST['subtopicRating']);
                $previouslyRated = $courseHandout_ob->stripBadChars($_POST['subtopicRated']);

                $student_ob->rateSubtopics($courseCode, $session, $topic, $subtopic, $enrollmentID, $subtopicRating, $previouslyRated, $db);
            }
        }

    }

?>