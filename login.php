<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../resources/TPALT_pfp.png">
</head>


<body>
    <div id="header" name="header">
        <h1>Đăng Nhập</h1>
    </div>

    <div id="login-status"></div>

    <div id="loginForm" name="loginForm">
        <form action="./login.php" method="post">
            <fieldset name="loginForm">
                <div class="form-component">
                    <div class="form-header">Tên người dùng <p>*</p>
                    </div>
                    <input type="text" name="username" placeholder="Tên người dùng" required>
                </div>

                <div class="form-component">
                    <div class="form-header">Mật khẩu <p>*</p>
                    </div>
                    <input type="password" name="pass" placeholder="Mật khẩu" required>
                </div>
            </fieldset>

            <div class="form-component">
                <input id="submit" type="submit" name="submit" value="Đăng nhập">
            </div>
        </form>
    </div>
</body>

<?php
    require_once("./php/connect_MySQL.php");
    require_once("./php/login_confirm.php");
?>