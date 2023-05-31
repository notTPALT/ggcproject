<?php 
    session_start();
    require('./php/connect_MySQL_n_log.php');
?>
<!--ĐĂNG NHẬP-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="./css/style_form.css">
    <style>
    .container {
        width: 470px;
        height: 390px;
    }

    table tbody {
        transform: translate(60px, -10px);
    }

    table tbody tr td {
        padding-top: 8px;
        padding-left: 6px;
    }

    /*CSS cho các label Username và Password*/
    label {
        font-size: 22px;
    }

    /*CSS cho dữ liệu đầu vào dạng text và password*/
    input[type='text'],
    input[type="password"] {
        width: 182px;
        height: 23px;
        margin: 3px 0px 0px -50px;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: -webkit-linear-gradient(to right, #155799, #159957);
        background: linear-gradient(to right, #155799, #159957);
        color: whitesmoke;
    }

    .container,
    .container-admin {
        position: relative;
        background-color: #8464c9;
        text-decoration: none;
        font-family: Inter;
        font-weight: 500;
        text-align: center;
        padding-top: 30px;
        overflow: hidden;
        border-radius: 12px;
    }

    .container {
        color: whitesmoke;
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(11, 15, 13, 0.582);
        border: 1px solid rgba(255, 255, 255, 0.125);
    }

    .container-admin {
        overflow: hidden;
        background: rgba(245, 245, 245, 0.767);
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
        width: 468px;
        height: 320px;
    }

    svg {
        position: absolute;
        left: 4px;
        top: 4px;
        width: 30px;
        height: 30px;
        padding: 5px;
        border-radius: 4px;
        background-color: white;
    }

    table {
        padding-top: 30px;
        text-align: left;
    }

    /*CSS phần chung cho các dữ liệu đầu vào dạng text,pasword, email và Select Class*/
    input[type='text'],
    input[type="password"],
    input[type='email'],
    #yourClass {
        background-color: whitesmoke;
        color: rgba(0, 0, 0, 0.733);
        border: none;
        padding-left: 5px;
    }

    /*CSS cho các phần riêng các option của select Class*/
    #yourClass {
        font-size: 20px;
        text-align: center;
    }

    /*CSS cho các lựa chọn lớp 10, lớp 11, lớp 12 của select Class */
    option {
        font-size: 22px;
        text-align: center;
    }

    /*CSS cho chữ của thẻ a*/
    a {
        font-size: 18px;
        color: #a39393;
    }

    /*CSS cho nút Nam, Nữ, Khác */
    input[type='radio'] {
        width: 19px;
        height: 19px;
        margin: 13px 3px 13px 18px;
    }

    /*CSS cho phần đè lên nút Nam, Nữ, Khác */
    input[type='radio']:after {
        width: 19px;
        height: 19px;
        border-radius: 19px;
        position: relative;
        background-color: whitesmoke;
        content: '';
        display: inline-block;
        visibility: visible;
    }

    /*CSS selection cho nút Nam, Nữ ,Khác */
    input[type='radio']:checked:after {
        width: 19px;
        height: 19px;
        border-radius: 19px;
        position: relative;
        background-color: rgb(34, 163, 142);
        content: '';
        display: inline-block;
        visibility: visible;
    }

    input[type='submit'] {
        border-radius: 4px;
        width: 122px;
        height: 44px;
        background-color: black;
        color: white;
        border: none;
        font-size: 19px;
        display: block;
        transform: translateY(20px);
        margin: 0 auto;
    }


    .container-transform {
        position: absolute;
        left: -2.7px;
        bottom: -10px;
        display: inline-flex;
    }

    #COSTOMER,
    #ADMIN {
        text-decoration: none;
        width: 239px;
        height: 45px;
        line-height: 27px;
        padding: 10px 20px 5px 20px;
        margin: 12px 0.3px 10px 0px;
    }

    #COSTOMER {
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(11, 15, 13, 0.582);
    }

    #ADMIN {
        background: linear-gradient(to right, #2A5470, #4C4177);
    }

    #COSTOMER>a,
    #ADMIN>a {
        text-decoration: none;
        display: block;
    }

    #COSTOMER>a {
        color: whitesmoke;
    }

    #ADMIN>a {
        color: black;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="sign-up">
            <table>
                <thead>
                    <tr>
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
                    </tr>

                    <tr>
                        <label for="" style="font-size: 35px;">Đăng nhập người dùng</label>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="2">
                            <p style="color: red; font-size: 15px; font-weight: 900;" id="error"></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Tài khoản</label>
                        </td>

                        <td>
                            <input type="text" id="username" name="taikhoan" size="30" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Mật khẩu</label>
                        </td>

                        <td>
                            <input type="password" id="Password" name="matkhau" size="30" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="./register.php">Bạn chưa có tài khoản?</a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="forget_password.php">Quên mật khẩu</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" name="dangnhap" id="sign-up_person" value="Đăng nhập">
        </form>

        <div class="container-transform">
            <div id="COSTOMER">
                <a href="./login.php">
                    USER
                </a>
            </div>

            <div id="ADMIN">
                <a href="./login_admin.php">
                    ADMIN
                </a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
	if (isset($_POST["dangnhap"])){
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		
		$sql = "SELECT * FROM user_infos where username = '$us' and pass = '$ps'";
		
		$user = mysqli_query($con, $sql);

		if (mysqli_num_rows($user) > 0) {
            $_SESSION['username'] = $us;
            project_log($con, "Logged in (User).");
			echo "<script>
                    location.href='index.php';
                </script>";
		} 
        else {
			echo "<script>
                    var a = document.getElementById('error');
                    a.innerHTML = '*Username or password incorrect*';
				</script>";
		}
		mysqli_close($con);
	}
?>