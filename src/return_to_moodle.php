<?php 

    session_destroy();
    mysqli_close();
    header('Location: https://moodle.niituniversity.in/moodle/');
?>
