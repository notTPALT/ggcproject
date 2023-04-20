<?php
session_start();
echo file_get_contents("./html/header.html");
?>

</h3 id="chapter-name">
</h3>
<div id="timer"></div>
<form id="answer-submit" action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <div id="result"></div>
    <div id="question-container"></div>
    <input id="submit" type="submit" name="submit" value="Nộp bài"></input>
</form>

<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL.php");
require_once("./php/index_action.php");
require_once("./php/test_get_data.php");
?>