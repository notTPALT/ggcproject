<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href="./login.php";</script>';
}
require_once("./html/header.php");
?>

<style>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

input[type="button"] {
    margin: 5px auto;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 150px;
    /* Đặt chiều rộng */
    height: 40px;
    /* Đặt chiều cao */
}

#submit {
    margin-top: 20px;
    /* Khoảng cách với phần tử trước đó */
    margin: 0 auto;
    text-align: center;
    color: #fff;
    background-color: #4CAF50;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    border: none;
}

#submit:hover {
    background-color: #45a049;
}

.question {
    margin-bottom: 20px;
    /* Khoảng cách giữa các câu hỏi */
}

#timer {
    margin-bottom: 20px;
    /* Khoảng cách từ thời gian đến câu hỏi */
    color: red;
    font-size: 30px;
    font-weight: bold;
}

.space-between-elements {
    margin-bottom: 20px;
    /* Khoảng cách dưới giữa các phần tử */
}

#next-chapter {
    margin-top: 20px;
    /* Khoảng cách với phần tử trước đó */
    margin: 0 auto;
    text-align: center;
    color: #fff;
    background-color: #4CAF50;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    border: none;
}

#next-chapter:hover {
    background-color: #45a049;
}

#result {
    font-size: 25px;
    font-weight: bold;
    color: red;
    text-align: center;
    margin-bottom: 20px;
    /* Khoảng cách giữa các câu hỏi */
}
</style>

<h3 id="chapter-name" style="font-size: 25px;"></h3>
<div class="container">
    <br>
    <!-- Dev note: 2 cái input và div trong này chung 1 chỗ nhé -->
    <input type="button" id="btn-start-timer" name="btn-start-timer" value="Bắt đầu làm bài!">
    <div id="timer" name="timer"></div>
</div>
<div id="result"></div>
<div id="check-ans"></div>
<div id="question-container"></div>
<button id="submit" name="ans-submit">Nộp bài!</button>
<button id="next-chapter" hidden></button>

<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/test_get_data.php");
?>