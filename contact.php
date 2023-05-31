<?php
session_start();
require_once("./html/header.php");
?>
<h3>Liên hệ:</h3>
<p>113: Cảnh sát</p>
<p>114: Cứu hoả</p>
<p>115: Cứu thương</p>
<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
?>