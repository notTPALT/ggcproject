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
                <?php
                        // Nội dung chào mừng và tính năng của trang web
                        $welcomeMessage = "Chào mừng đến với Project Web thi Vật lý trắc nghiệm online!";
                        $quizMessage = "Bài thi trắc nghiệm: Trang web cung cấp một loạt các bài thi trắc nghiệm với nhiều cấp độ khác nhau, từ cơ bản đến nâng cao. Bạn có thể chọn bài thi phù hợp với trình độ của mình và hoàn thành trong thời gian giới hạn.";
                        $resultMessage = "Thống kê kết quả: Sau khi hoàn thành bài thi, bạn có thể xem kết quả và nhận phản hồi chi tiết về những câu trả lời đúng và sai. Bạn cũng có thể xem điểm số tổng quan và thống kê tiến bộ của bản thân trong quá trình học.";
                        $resourceMessage = "Học liệu và tài liệu tham khảo: Trang web cung cấp các tài liệu học tập và tài liệu tham khảo để bạn nắm vững kiến thức vật lý. Bạn có thể tìm hiểu các khái niệm, lý thuyết và bài tập để rèn kỹ năng giải quyết các bài toán vật lý.";
                        $forumMessage = "Diễn đàn thảo luận: Trang web cung cấp một diễn đàn thảo luận nơi bạn có thể trao đổi và thảo luận với cộng đồng học sinh và giáo viên. Bạn có thể đặt câu hỏi, trả lời câu hỏi của người khác và chia sẻ kinh nghiệm học tập của mình.";
                        $accountMessage = "Thông tin cá nhân và theo dõi tiến độ: Trang web cho phép bạn tạo một tài khoản cá nhân, nơi bạn có thể theo dõi tiến độ học tập, lưu trữ kết quả bài thi và tùy chỉnh cài đặt cá nhân.";
                    ?>
                <h1 style="font-size: 24px; color: #333; margin-bottom: 10px;"><?php echo $welcomeMessage; ?></h1>
                <p style="font-size: 16px; color: #666; margin-bottom: 15px;"><?php echo $quizMessage; ?></p>
                <p style="font-size: 16px; color: #666; margin-bottom: 15px;"><?php echo $resultMessage; ?></p>
                <p style="font-size: 16px; color: #666; margin-bottom: 15px;"><?php echo $resourceMessage; ?></p>
                <p style="font-size: 16px; color: #666; margin-bottom: 15px;"><?php echo $forumMessage; ?></p>
                <p style="font-size: 16px; color: #666; margin-bottom: 15px;"><?php echo $accountMessage; ?></p>
            </div>
        </div>
        <?php 
                echo file_get_contents("./html/footer.html");
            ?>
    </div>
</body>

</html>