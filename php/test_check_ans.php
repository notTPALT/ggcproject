<?php
require_once("./connect_MySQL_n_log.php");
session_start();
$level = $_POST['level'];
$chapter = $_POST['chapter'];
$question_table_name = "ques_".$level."_".$chapter;
$get_question_sets = mysqli_prepare($con, "SELECT right_ans FROM ".$question_table_name." WHERE idx = ".$_POST['ques_index']);
if ($get_question_sets) {
    mysqli_stmt_execute($get_question_sets);
    mysqli_stmt_bind_result($get_question_sets, $ans);
    if (mysqli_stmt_fetch($get_question_sets)) {
        echo $ans;
    }
}
?>