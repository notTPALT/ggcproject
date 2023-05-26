<?php
    session_start();
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
        <title>Home - GGC</title>
        <link rel="icon" href="./resources/favicon.png">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <div id="container">
            <?php require_once("./html/header.php"); ?>

            <!--Nội dung của trang-->
            <div class="container-content">
                <div class="box-content">
                    <h2>Xin chào!</h2>
                    <p>Chào mừng đã đến với trang ôn tập thi trắc nghiêm môn Vật lí - một dự án nhở của nhóm GGC (Goblin Go Code).</p>
                    <p>Đây là 1 dự án nhỏ, tất nhiên sẽ có "một ít" sai sót, hi vọng các bạn có thể đóng góp giúp dự án trở nên hoàn thiện hơn.</p>
                </div>
            </div>
            <?php 
                echo file_get_contents("./html/footer.html");
            ?>
        </div>
    </body>
</html>
