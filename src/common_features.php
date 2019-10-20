<?php

    include('database_connection.php');
    include('classes_and_functions.php');

    if(isset($_POST['method'])) {

        if($_POST['method'] == 'getNotificationDetail' && isset($_POST['meetingID']) ) {

            $userClass_ob = new userClass();
            $meetingID = $_POST['meetingID'];
            $userClass_ob->getNotificationDetail($meetingID, $db);
        }


        if($_POST['method'] == 'acceptMeetingRequest' && isset($_POST['meetingID']) && isset($_POST['date']) && isset($_POST['time']) ) {

            $userClass_ob = new userClass();
            $meetingID = $_POST['meetingID'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $userClass_ob->acceptMeetingRequest($meetingID, $date, $time, $db);
        }

    }

?>