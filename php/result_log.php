<?php
/**
 * File này dùng để lưu lại lịch sử ôn tập lên CSDL
 */

require_once("./connect_MySQL_n_log.php");
session_start();

$correct = $_POST['correct'];
$total = $_POST['total'];
$score = $_POST['score'];
$level = $_POST['level'];
$chapter = $_POST['chapter'];

project_log($con, "Finished practicing level ".$level." chapter ".$chapter.". Correct: ".$correct." Total: ".$total." Point: ".$score);
?>