<?php
    $con = mysqli_connect("localhost", "root", "", "ggcproject");
    function project_log($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('".$_SESSION['username']."', '".$logstring."')");
    }

    function project_log_no_username($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('unidentified', '".$logstring."')");
    }

    function project_log_admin($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('".$_SESSION['admin']."', '".$logstring."')");
    }
?>