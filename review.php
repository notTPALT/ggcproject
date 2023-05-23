<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="./login.php";</script>';
}
require_once("./html/header.php");
?>

<link rel="stylesheet" href="./css/review.css">

<h3 id="chapter-name" style="font-size: 25px;"></h3>
<div id="result"></div>
<div id="check-ans"></div>
<div id="question-container"></div>
<button id="submit" name="ans-submit">Kiểm tra đáp án</button>
<button id="prev-chapter" hidden></button>
<button id="next-chapter" hidden></button>

<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/review_retrieve_data.php");
?>