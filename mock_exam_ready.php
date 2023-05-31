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
        <title>Thi thử - GGC</title>
        <link rel="icon" href="./resources/favicon.png">
        <link rel="stylesheet" href="css/index.css">
    </head>

    <body>
        <div id="container">
            <?php require_once("./html/header.php"); ?>

            <!--Nội dung của trang-->
            <div class="container-content">
                <div class="box-content">
                    <br>
                    <p style="font-size: 30px;text-align:center;"><b>Test trắc nghiệm vật lý THPT môn Vật lý - GGC</b></p>
                    <br><br>
                    <p style="padding-left: 50px;font-size: 20px;"><b>Hướng dẫn làm bài :</b></p><br><br>
                    <p style="padding-left: 50px;font-size: 20px;">- Bạn có 40 phút để hoàn thành 40 câu hỏi trắc nghiệm vật
                        lý.</p><br><br>
                    <p style="padding-left: 50px;font-size: 20px;padding-right: 80px;">- Khi bạn trả lời 1 câu hỏi bất kỳ và
                        chuyển sang câu khác thì câu đã trả lời sẽ chuyển sang màu cam.</p><br><br>
                    <p style="padding-left: 50px;font-size: 20px;padding-right: 80px;">- Để trở về câu hỏi trước hoặc chuyển
                        sang câu tiếp theo, click vào 2 nút câu trước và câu tiếp theo để thực hiện. </p><br><br>
                    <p style="padding-left: 50px;font-size: 20px;padding-right: 80px;">- Để có thể đi đến câu hỏi bất kỳ
                        trong 40 câu hỏi bạn có thể click vào các nút câu hỏi trong phần "Chọn câu hỏi".</p><br><br>
                    <p style="padding-left: 50px;font-size: 20px;padding-right: 80px;">- Để bắt đầu làm bài. Bạn click vào
                        nút "TEST" bên dưới. </p><br><br>
                    <a href="mock_exam_go.php" class="my-button">TEST</a>
                </div>
            </div>
            <?php 
                echo file_get_contents("./html/footer.html");
            ?>
        </div>
    </body>
</html>

