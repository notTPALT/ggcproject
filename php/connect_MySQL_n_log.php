<?php
    $con = mysqli_connect("localhost", "root", "", "webthi");
    function project_log($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('".$_SESSION['username']."', '".$logstring."')");
    }
?>