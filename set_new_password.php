<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="./css/style_form.css">
    <style>
    .container {
        width: 450px;
        height: 300px;
    }

    table {
        height: 120px;
        padding-top: 10px;
        transform: translateX(30px);
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
        height: 25px;
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

        <label for="" style="font-size: 28px;">Quên mật khẩu</label>

        <div id="submit-form" name="submit-form">
            <form action="./set_new_password.php" method="post">
                <table>
                    <tr>
                        <td>
                            <div id="pass-check"></div>
                        </td>
                    </tr>


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
                <input id="submit" type="submit" name="submit" value="Hoàn thành">
            </form>
        </div>
</body>

<?php
    require_once("./php/connect_MySQL_n_log.php");
    require_once("./php/set_new_password_action.php");
?>