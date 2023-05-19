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
        .container{
          width: 689px;
          height: 440px;
        }

        table{
         transform: translateX(70px);
        }

        /*CSS cho các label Username, Old password, New password, Re-en new password */
        label{
          font-size: 22px;
        }

        /*CSS cho các dữ liệu đầu vào dạng text và password*/
        input[type='text'],
        input[type='password'] {
          width: 192px; 
          height: 28px;
          background-color: whitesmoke;
          color: rgba(0, 0, 0, 0.733); 
          border: none; 
          padding-left: 5px;
          margin: 13px 0px 13px 18px;
        } 
    </style>
</head>

<body>
    <div class="container">
        <input type="submit" style = "position: absolute;
                                      width: 40px;
                                      height: 40px;
                                      top: -15px;
                                      left: 4px" id="btn_homepage" onclick="location.href='./index.php'" value="🏠">
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
                        <input type="password" style = "width: 300px;height: 30px;margin-left: 30px;" name="old-pass" id="old-pass" size="30" placeholder="Mật khẩu cũ"
                            required><br><br>
                    </td>
                </tr>

                <tr>
                    <div id="pass-check"></div>
                    <td>
                        <label for="new-pass">Mật khẩu mới<br><br></label>
                    </td>

                    <td>
                        <input type="password" style = "width: 300px;height: 30px;margin-left: 30px;" name="new-pass" id="new-pass" size="30" placeholder="Mật khẩu mới"
                            required><br><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="re-enter-new-pass">Nhập lại mật khẩu<br><br></label>
                    </td>

                    <td>
                        <input type="password" style = "width: 300px;height: 30px;margin-left: 30px;" name="re-enter-new-pass" id="re-enter-new-pass" size="30"
                            placeholder="Nhập lại mật khẩu" required><br><br>
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