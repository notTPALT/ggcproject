<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="./css/style_form.css">
    <style>
    .container {
        width: 689px;
        height: 440px;
    }

    table {
        transform: translateX(70px);
    }

    /*CSS cho các label Username, Old password, New password, Re-en new password */
    label {
        font-size: 22px;
    }

    /*CSS cho các dữ liệu đầu vào dạng password*/
    input[type='password'] {
        width: 192px;
        height: 28px;
        margin: 13px 0px 13px 18px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <a href="./index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64"
                    style="isolation:isolate" id="home">
                    <defs>
                        <clipPath id="a">
                            <rect width="64" height="64"></rect>
                        </clipPath>
                    </defs>
                    <g clip-path="url(#a)">
                        <path
                            d=" M 43.045 61.369 L 59.016 61.369 C 60.669 61.369 62.006 60.027 62 58.374 L 61.894 29.675 C 61.89 28.573 61.214 27.088 60.387 26.361 L 34.314 3.452 C 33.072 2.361 31.053 2.357 29.806 3.443 L 3.498 26.367 C 2.667 27.091 1.996 28.573 2 29.675 L 2.106 58.374 C 2.112 60.027 3.459 61.369 5.112 61.369 L 21.084 61.369 C 22.737 61.369 24.078 60.027 24.078 58.374 L 24.078 45.397 C 24.078 44.295 24.973 43.401 26.075 43.401 L 38.054 43.401 C 39.155 43.401 40.05 44.295 40.05 45.397 L 40.05 58.374 C 40.05 60.027 41.392 61.369 43.045 61.369 Z ">
                        </path>
                    </g>
                </svg>
            </a>
        </div>
        <form action="./change_password.php" method="post" name="change_password">
            <div><label for="" style="font-size: 28px;">Đổi mật khẩu</label></div>
            <table>
                <tr>
                    <div id="verification-check"></div>
                <tr>
                    <td>
                        <label for="old-pass">Mật khẩu cũ<br><br></label>
                    </td>

                    <td>
                        <input type="password" style="width: 300px;height: 30px;margin-left: 30px;" name="old-pass"
                            id="old-pass" size="30" placeholder="Mật khẩu cũ" required><br><br>
                    </td>
                </tr>

                <tr>
                    <div id="pass-check"></div>
                    <td>
                        <label for="new-pass">Mật khẩu mới<br><br></label>
                    </td>

                    <td>
                        <input type="password" style="width: 300px;height: 30px;margin-left: 30px;" name="new-pass"
                            id="new-pass" size="30" placeholder="Mật khẩu mới" required><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="re-enter-new-pass">Nhập lại mật khẩu<br><br></label>
                    </td>

                    <td>
                        <input type="password" style="width: 300px;height: 30px;margin-left: 30px;"
                            name="re-enter-new-pass" id="re-enter-new-pass" size="30" placeholder="Nhập lại mật khẩu"
                            required><br><br>
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