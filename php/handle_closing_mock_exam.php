<?php 
require_once("./connect_MySQL_n_log.php");
session_start();
mysqli_query($con, "DROP TABLE ".$test);
mysqli_query($con, "INSERT INTO mock_exam_history VALUES ('".$_SESSION['username']."', 0, 0, 0, 0)");
project_log($con, "Bỏ thi thử. Điểm: 0."); 
echo 'Lmao';
?>