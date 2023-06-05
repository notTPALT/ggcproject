<?php 
    session_start();
    require('./php/connect_MySQL_n_log.php');
?>

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
    </style>
</head>

<body>
    <div class="container">
        <!-- Form đăng nhập -->
        <form action="./login.php" method="POST" name="sign-up">
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

        <!-- Chuyển đổi giữa đăng nhập người dùng vá admin -->
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
    // Chạy khi người dùng đã nhấn nút đăng nhập
	if (isset($_POST["dangnhap"])){
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		
        // Tìm thông tin đăng nhập trong CSDL
		$sql = "SELECT * FROM user_infos where username = '$us' and pass = '$ps'";		
		$user = mysqli_query($con, $sql);

        // Xác nhận thông tin đăng nhập có tồn tại trong CSDL không
		if (mysqli_num_rows($user) > 0) {
            $_SESSION['username'] = $us; // Lưu lại tên tài khoản vào session

            // Lưu lần đăng nhập thành công này vào lịch sử hoạt động
            project_log($con, "Logged in (User).");

            // Chuyển đến trang chủ sau khi đăng nhập thành công
			echo "<script>
                    location.href='index.php';
                </script>";
		} 
        else {
            // Thông báo sai thông tin đăng nhập
			echo "<script>
                    var a = document.getElementById('error');
                    a.innerHTML = '*Tài khoản hoặc mật khẩu không đúng*';
				</script>";
		}
		mysqli_close($con);
	}
?>