<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        echo '<script>window.location.href="./login.php";</script>';
    }
    require_once("./php/connect_MySQL_n_log.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <title>Ôn tập chương</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/review.css">
</head>

<body>
    <div id="container">
        <?php require_once("./html/header.php"); ?>
        <!--Nội dung của trang-->
        <div class="container-content">
            <div id="box-content" class="box-content">

                <!-- Tên chương hiện tại -->
                <h3 id="chapter-name" style="font-size: 25px;"></h3>

                <!-- Chứa các câu hỏi ôn tập -->
                <div id="question-container"></div>

                <button id="submit" name="ans-submit">Nộp bài!</button>

                <!-- Sẽ hiển thị sau khi nhấn nộp bài -->
                <button id="next-chapter" hidden></button>

                <!-- Hiển thị kết quả ôn tập -->
                <div id="result" style="display: inline-block;"></div>
            </div>
        </div>
        <?php 
            echo file_get_contents("./html/footer.html");
            require_once("./php/review_retrieve_data.php");
        ?>
    </div>
</body>

</html>