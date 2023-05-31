<?php
require_once("./connect_MySQL_n_log.php");
session_start();
$username = $_POST['checkingUsername'];

$question_get = mysqli_query($con, "SELECT secure_question FROM user_infos WHERE username = '$username';");

$question_row = mysqli_fetch_row($question_get);
if ($question_row) {
    echo $question_row[0];
} else {
    echo "No question found.";
}
?>