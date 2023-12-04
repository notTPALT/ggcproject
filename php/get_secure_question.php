<?php
/**
 * File này dùng để trả về câu hỏi bảo mật dựa theo tên tài khoản 
 */

require_once("./connect_MySQL_n_log.php");
session_start();

// Lấy tên tài khoản được đưa vào
$username = $_POST['checkingUsername'];

// Truy vấn lấy câu hỏi
$question_get = mysqli_query($con, "SELECT secure_question FROM user_infos WHERE username = '$username';");

$question_row = mysqli_fetch_row($question_get);
if ($question_row) {
    // Trả về câu hỏi
    echo $question_row[0];
} else {
    echo "No question found.";
}
?>