<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="./login.php";</script>';
}
require_once("./html/header.php");
?>

<h3 id="chapter-name">
</h3>
<div>
    <!-- Dev note: 2 cái input và div trong này chung 1 chỗ nhé -->
    <input type="button" id="btn-start-timer" name="btn-start-timer" value="Bắt đầu làm bài!"></button>
    <div id="timer" name="timer"></div>
</div>
<div id="result"></div>
<div id="check-ans"></div>
<div id="question-container"></div>
<button id="submit" name="ans-submit">Nộp bài!</button>
<button id="next-chapter" hidden></button>
<!-- </form> -->

<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/test_get_data.php");
?>