<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="./css/style.css">
=======
    <title>Đặt mật khẩu mới</title>
    <link rel="stylesheet" href="./css/style_form.css">
    <link rel="icon" href="./resources/favicon.png">
    <style>
    .container {
        width: 450px;
        height: 309px;
    }

    table {
        height: 120px;
        padding-top: 10px;
        transform: translateX(50px);
    }

    /*CSS cho các cột trong table */
    table tr td {
        padding-top: 10px;
    }

    /*CSS cho các label Username và Password*/
    label {
        font-size: 20px;
    }

    /*CSS cho dữ liệu đầu vào dạng password*/
    input[type="password"] {
        width: 180px;
        height: 27px;
        margin: 13px 0px 13px 18px;
        border-radius: 5px;
    }
    </style>
>>>>>>> Stashed changes
</head>

<body>
    <button type="button" id="btn_homepage" onclick="location.href='./index.php'">Trang chủ</button>

<<<<<<< Updated upstream
    <div id="header" name="header">
        <h1>Quên mật khẩu</h1>
    </div>

    <div id="submit-form" name="submit-form">
        <form action="./set_new_password.php" method="post">
            <fieldset name="submit-form">
                <div id="pass-check"></div>
                <div class="form-component">
                    <div class="form-header">Mật khẩu mới <p>*</p>
                    </div>
                    <input type="password" name="pass" placeholder="Mật khẩu mới" required>
                </div>
=======
        <label for="" style="font-size: 28px;">Đặt mật khẩu mới</label>

        <div id="submit-form" name="submit-form">
            <form action="./set_new_password.php" method="post">
                <table>
                    <tr>
                        <td colspan="2">
                            <div id="pass-check" style="color: red; font-size: 15px;"></div>
                        </td>
                    </tr>
>>>>>>> Stashed changes

                <div class="form-component">
                    <div class="form-header">Nhập lại mật khẩu <p>*</p>
                    </div>
                    <input type="password" name="rpass" placeholder="Nhập lại mật khâu" required>
                </div>
            </fieldset>

<<<<<<< Updated upstream
            <div class="form-component">
                <input id="submit" type="submit" name="submit" value="Hoàn thành">
            </div>
        </form>
    </div>
=======
                    <tr>
                        <td>
                            <label for="">Mật khẩu mới</label>
                        </td>

                        <td>
                            <input type="password" name="pass" placeholder="Mật khẩu mới" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Nhập lại mật khẩu</label>
                        </td>

                        <td>
                            <input type="password" name="rpass" placeholder="Nhập lại mật khâu" required>
                        </td>
                    </tr>
                </table>
                <input id="submit" type="submit" name="set-new-pass-submit" value="Hoàn thành">
            </form>
        </div>
>>>>>>> Stashed changes
</body>

<?php
    require_once("./php/connect_MySQL_n_log.php");
    require_once("./php/set_new_password_action.php");
?>