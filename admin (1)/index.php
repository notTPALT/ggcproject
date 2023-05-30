<?php
    session_start();
    require('../php/connect_MySQL_n_log.php');
    $username = isset($_POST['ad']) ? $_POST['ad'] : "admin";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - GGC</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once("./php/form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><a href="#" class="active"><b>Danh mục</b></a></li>
                    <li><a href="user.php">亗 Tài khoản</a></li>
                    <li><a href="question.php">亗 Câu hỏi thi thử</a></li>
                    <li><a href="point.php">亗 Điểm</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style = "width : 80%">
           
        </div>
    </div>

    <?php require_once("../html/footer.html"); ?>
</body>
</html>