<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONAL INFORMATION</title>
    <link rel="stylesheet" href="./css/user_infos.css">
</head>

<body>
    <div class="container">
        <form action="./change_user_infos.php" method="post" name="personal_information">
            <label id="target" for="" style="font-size: 28px;">Thông tin cá nhân: </label>
            <table>
                <tr>
                    <td>
                        <label for="fname">Họ:</label>
                    </td>
                    <td>
                        <label id="fname">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="lname">Tên:</label>
                    </td>
                    <td>
                        <label id="lname">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="gender">Giới tính:</label>
                    </td>
                    <td>
                        <label id="gender">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="birthdate">Ngày sinh</label>
                    </td>
                    <td>
                        <label id="birthdate">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <label id="email">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="phone">Số điện thoại:</label>
                    </td>
                    <td>
                        <label id="phone">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="addrs">Địa chỉ:</label>
                    </td>
                    <td>
                        <label id="addrs">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="secure-question">Câu hỏi bảo mật:</label>
                    </td>
                    <td>
                        <label id="secure-question">Không có</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="secure-answer">Câu trả lời:</label>
                    </td>
                    <td>
                        <label id="secure-answer">Không có</label>
                    </td>
                </tr>
            </table>
            <input type="submit" name="update_infor" id="update_infor" value="UPDATE">
        </form>
    </div>
</body>

</html>

<?php
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/user_infos_action.php");