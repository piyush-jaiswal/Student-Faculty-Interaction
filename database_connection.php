<?php 

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'q1w2e3r4';
    $dbname = 'StudentFacultyInteraction';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(! $db ) {
        die('Could not connect to database: ' . mysqli_error());
    }

    //echo 'Connected successfully'; 

?>