<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay đổi thông tin cá nhân</title>
    <link rel="stylesheet" href="./css/change_user_infos.css">
</head>

<body>
    <div class="container">
        <button type="button" id="btn_homepage" onclick="location.href='./index.php'">Trang chủ</button>

        <form action="./change_user_infos.php" method="post" name="change_personal_information">
            <label id="target" for="" style="font-size: 28px;">Thay đổi thông tin cá nhân của </label>
            <table>
                <tr>
                    <td>
                        <label for="fname">Họ:</label>
                    </td>
                    <td>
                        <input type="text" name="fname" id="fname" placeholder="Họ">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="lname">Tên:</label>
                    </td>
                    <td>
                        <input type="text" name="lname" id="lname" placeholder="Tên">
                    </td>
                </tr>

                <!-- <tr>
                    <td>
                        <label for="yourClass">Lớp:</label>
                    </td>

                    <td>
                        <select name="Class" id="yourClass">
                            <option value="class10">Lớp 10</option>
                            <option value="class11">Lớp 11</option>
                            <option value="class12">Lớp 12</option>
                        </select>
                    </td>
                </tr> -->

                <tr>
                    <td>
                        <label for="gender" style="font-size: 20px;">Giới tính:</label>
                    </td>

                    <td>
                        <input name="gender" type="radio" value="0">
                        <label for="">Nam</label>

                        <input name="gender" type="radio" value="1">
                        <label for="">Nữ</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="birth-date">Ngày sinh:</label>
                    </td>
                    <td>
                        <input type="date" name="birthdate" id="birthdate" value>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>

                    <td>
                        <input type="text" name="email" id="email" size="30" placeholder="username@example.com">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="phone">Số điện thoại:</label>
                    </td>
                    <td>
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="addrs">Địa chỉ:</label>
                    </td>
                    <td>
                        <input type="text" name="addrs" id="addrs" placeholder="Địa chỉ">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="secure-question">Câu hỏi bảo mật:</label>
                    </td>
                    <td>
                        <input type="text" name="secure-question" id="secure-question" placeholder="Câu hỏi bảo mật">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="secure-answer">Câu trả lời:</label>
                    </td>
                    <td>
                        <input type="text" name="secure-answer" id="secure-answer" placeholder="Câu trả lời">
                    </td>
                </tr>
            </table>
            <input type="submit" name="change-user-infos" id="change-user-infos" value="Đổi thông tin" disabled>
        </form>
    </div>
</body>

</html>

<?php
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/change_user_infos_action.php");