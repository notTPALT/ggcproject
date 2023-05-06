<?php
session_start();
echo file_get_contents("./html/header.html");
?>

<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/index_action.php");
?>