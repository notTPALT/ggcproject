<?php 
require_once("./connect_MySQL_n_log.php");
session_start();
$_SESSION['timeLeft'] = $_POST['timeLeft'];
$test = $_POST['tableName'];
echo $_POST['timeLeft'];
unset($_POST['timeLeft'], $_POST['tableName']);
?>