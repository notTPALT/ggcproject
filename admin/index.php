<?php
    session_start();
    if (isset($_SESSION['admin'])){
    require('../php/connect_MySQL_n_log.php');
    $username = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Admin</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php require_once("form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><a href="#" class="active"><b>Danh mục</b></a></li>
                    <li><a href="account_user.php">亗 Tài khoản</a></li>
                    <li><a href="question.php">亗 Câu hỏi thi thử</a></li>
                    <li><a href="account_admin.php">亗 Tài khoản admin</a></li>
                    <li id="review-index"><a>亗 Câu hỏi ôn tập</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style="width : 80%">

        </div>
    </div>
    <?php echo file_get_contents("../html/footer.html"); ?>
</body>

</html>
<?php 
    } 
    else{
        header('Location: ../login_admin.php');
        exit;
    }
?>