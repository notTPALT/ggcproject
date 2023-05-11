<?php
session_start();
require_once("./html/header.php");
?>
<a href="https://google.com">Tài liệu mẫu</a>
<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
?>