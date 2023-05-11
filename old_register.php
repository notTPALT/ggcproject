<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../resources/TPALT_pfp.png">
</head>


<body>
    <div id="register-status"></div>
    <p id="countdown"></p>

    <div id="header" name="header">
        <h1>Đăng ký</h1>
    </div>

    <div id="submit-form" name="submit-form">
        <form action="./register.php" method="post">
            <fieldset id="login-info" name="login-info">
                <legend>
                    <h3>1. Thông tin đăng nhập</h3>
                </legend>

                <div id="username-availablity-check"></div>
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

                <div id="rpass-check"></div>
                <div class="form-component">
                    <div class="form-header">Nhập lại mật khẩu <p>*</p>
                    </div>
                    <input type="password" name="rpass" placeholder="Nhập lại mật khẩu" required>
                </div>

                <div class="form-component">
                    <div class="form-header">Câu hỏi bảo mật (Tự viết) <p>*</p>
                    </div>
                    <input type="text" name="secure_question" placeholder="Câu hỏi bảo mật" required>
                </div>

                <div class="form-component">
                    <div class="form-header">Câu trả lời <p>*</p>
                    </div>
                    <input type="text" name="secure_answer" placeholder="Câu trả lời" required>
                </div>
            </fieldset>

            <fieldset id="personal-info" name="personal-info">
                <legend>
                    <h3>2. Thông tin cá nhân</h3>
                </legend>

                <div class="form-component">
                    <div class="form-header">Họ</div>
                    <input type="text" name="fname" placeholder="Họ">
                </div>

                <div class="form-component">
                    <div class="form-header">Tên</div>
                    <input type="text" name="lname" placeholder="Tên">
                </div>

                <div class="form-component">
                    <div class="form-header">Giới tính</div>
                    <div id="radio-gender">
                        <input type="radio" id="male" name="gender" value="male" checked>
                        <label for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Nữ</label>
                    </div>
                </div>

                <div class="form-component">
                    <div class="form-header">Ngày sinh</div>
                    <input type="date" name="birthdate">
                </div>

                <div class="form-component">
                    <div class="form-header">Địa chỉ</div>
                    <input type="text" name="address" placeholder="Địa chỉ">
                </div>

                <div class="form-component">
                    <div class="form-header">Email</div>
                    <input type="text" name="email" placeholder="Email">
                </div>

                <div class="form-component">
                    <div class="form-header">Số điện thoại</div>
                    <input type="text" name="phone" placeholder="Số điện thoại">
                </div>
            </fieldset>

            <div class="form-component">
                <input id="submit" type="submit" name="submit" value="Đăng ký">
            </div>
        </form>
    </div>
</body>

<?php
    require_once("./php/connect_MySQL_n_log.php");
    require_once("./php/register_confirm.php");
?>