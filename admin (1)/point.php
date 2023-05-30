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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Point - GGC</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        /* CSS để tạo header và footer */
        header {
            background-color: #F0E68C;
            padding: 10px;
            text-align: center;
        }
        /* CSS để xây dựng layout */
        .container {
            display: flex;
            height: 62.5vh;
            margin-bottom: 0;
        }
        .footer-container {
            margin-top: 0;
        }
        .sidebar {
            flex: 1;
            background-color: yellowgreen;
            width: 20%;
            padding: 10px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 5px;
            background-color: #f2f2f2;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #ccc;
        }
        .sidebar a.active {
            background-color: #ff9800;
            text-align: center;
            font-size: 20px;
        }
        input[type="submit"] {
        height: 30px;
        padding: 5px 10px;
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <?php require_once("./php/form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <!-- Danh mục nội dung -->
                <ul>
                    <li><a href="" class="active"><b>Danh mục</b></a></li>
                    <li><a href="user.php">亗 Tài khoản</a></li>
                    <li><a href="question.php">亗 Câu hỏi thi thử</a></li>
                    <li><a href="point.php" style="background-color: yellow;">亗 Điểm ◉</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style = "width : 80%">
            
        </div>
    </div>

    <?php require_once("../html/footer.html"); ?>
</body>
</html>
