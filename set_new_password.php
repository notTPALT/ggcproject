<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu (Unfinished)</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="header" name="header">
        <h1>Quên mật khẩu</h1>
    </div>

    <div id="login-status"></div>

    <div id="loginForm" name="loginForm">
        <form action="./forget-password.php" method="post">
            <fieldset name="loginForm">
                <div class="form-component">
                    <div class="form-header">Mật khẩu mới <p>*</p>
                    </div>
                    <input type="password" name="pass" placeholder="Mật khẩu mới" required>
                </div>

                <div class="form-component">
                    <div class="form-header">Nhập lại mật khẩu <p>*</p>
                    </div>
                    <input type="password" name="rpass" placeholder="Nhập lại mật khâu" required>
                </div>
            </fieldset>

            <div class="form-component">
                <input id="submit" type="submit" name="submit" value="Hoàn thành">
            </div>
        </form>
    </div>
</body>

<?php
    require_once("./php/connect_MySQL.php");
    require_once("./php/forget_password_action.php");
?>