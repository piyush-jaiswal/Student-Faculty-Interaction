<?php 

    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'StudentFacultyInteraction';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(! $db ) {
        die('Could not connect to database: ' . mysqli_error());
    }

    //echo 'Connected successfully'; 

?>