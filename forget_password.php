<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="./css/style_form.css">
</head>

<body>
    <div id="header" name="header">
        <h1>Quên mật khẩu</h1>
    </div>
    <button type="button" id="btn_homepage" onclick="location.href='./index.php'">Trang chủ</button>

    <div id="submit-form" name="submit-form">
        <form action="./forget_password.php" method="post">
            <fieldset name="submit-form">
                <div id="verification-check"></div>
                <div class="form-component">
                    <div class="form-header">Tên người dùng <p>*</p>
                    </div>
                    <input type="text" name="username" placeholder="Tên người dùng" required>
                </div>

                <div class="form-component">
                    <div id="secure_question" class="form-header">Câu hỏi bảo mật:
                    </div>
                    <input type="text" name="secure_answer" placeholder="Câu trả lời" required>
                </div>
            </fieldset>

            <div class="form-component">
                <input id="submit" type="submit" name="submit" value="Gửi">
            </div>
        </form>
    </div>
</body>

<?php
    require_once("./php/connect_MySQL_n_log.php");
    require_once("./php/forget_password_action.php");
?>