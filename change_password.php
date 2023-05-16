<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="./css/change_password.css">
</head>

<body>
    <div class="container">
        <button type="button" id="btn_homepage" onclick="location.href='./index.php'">Trang chủ</button>

        <form action="./change_password.php" method="post" name="change_password">
            <div><label for="" style="font-size: 28px;">Đổi mật khẩu</label></div>
            <table>
                <tr>
                    <div id="verification-check"></div>
                <tr>
                    <td>
                        <label for="old-pass">Mật khẩu cũ:</label>
                    </td>

                    <td>
                        <input type="password" name="old-pass" id="old-pass" size="30" placeholder="Mật khẩu cũ"
                            required>
                    </td>
                </tr>

                <tr>
                    <div id="pass-check"></div>
                    <td>
                        <label for="new-pass">Mật khẩu mới:</label>
                    </td>

                    <td>
                        <input type="password" name="new-pass" id="new-pass" size="30" placeholder="Mật khẩu mới"
                            required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="re-enter-new-pass">Nhập lại mật khẩu:</label>
                    </td>

                    <td>
                        <input type="password" name="re-enter-new-pass" id="re-enter-new-pass" size="30"
                            placeholder="Nhập lại mật khẩu" required>
                    </td>
                </tr>
            </table>
            <input type="submit" name="change-pass" id="change-pass" value="Đổi">
        </form>
    </div>
</body>

</html>

<?php
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/change_password_action.php");