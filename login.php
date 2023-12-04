<?php 
    session_start();
    require('./php/connect_MySQL_n_log.php');
?>
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in </title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="css/style_form.css">
    <style>
    .container {
        width: 470px;
        height: 360px;
        padding: 0px 10px;
    }

    table {
        transform: translateX(60px);
    }

    /*CSS cho các cột trong table */
    table tr td {
        padding-top: 12px;
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
<<<<<<< Updated upstream
        background-color: #a39393;
        border: none;
        margin: 3px 0px 0px -50px;
    }

    /*CSS cho chữ của thẻ a*/
    a {
        font-size: 18px;
        color: #a39393;
    }
=======
        margin: 3px 0px 0px -50px;
    }
>>>>>>> Stashed changes
    </style>
</head>

<body>
    <div class="container">
<<<<<<< Updated upstream
        <input type="submit" style = "margin-left: 5px;width: 40px;height: 40px;padding: 10px 10px;" id="btn_homepage" onclick="location.href='./index.php'" value="🏠">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="sign-up">
            <label for="" style="font-size: 35px;">Sign in</label>
=======
        <!-- Form đăng nhập -->
        <form action="./login.php" method="POST" name="sign-up">
>>>>>>> Stashed changes
            <table>
                <tr>
                    <td colspan="2">
                        <p style="color: red; font-size: 15px;" id="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Username:</label>
                    </td>

                    <td>
                        <input type="text" id="username" name="taikhoan" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="">Password: </label>
                    </td>

                    <td>
                        <input type="password" id="Password" name="matkhau" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="./register.php">Don't have account?</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="forget_password.php">Forget Password</a>
                    </td>
                </tr>

            </table>
            <input type="submit" name="dangnhap" id="sign-up_person" value="Sign in">
        </form>
<<<<<<< Updated upstream
=======

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
>>>>>>> Stashed changes
    </div>
</body>

</html>
<?php
<<<<<<< Updated upstream
	if ((isset($_POST["dangnhap"])) && ($_POST['taikhoan'] != '') && ($_POST['matkhau'] != '')){
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		
		// $sql = "SELECT COUNT(*) as total FROM user_infos where username = '$us' and pass = '$ps'";
		$sql = "SELECT * FROM user_infos where username = '$us' and pass = '$ps'";
		
=======
    // Chạy khi người dùng đã nhấn nút đăng nhập
	if (isset($_POST["dangnhap"])){
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		
        // Tìm thông tin đăng nhập trong CSDL
		$sql = "SELECT * FROM user_infos where username = '$us' and pass = '$ps'";		
>>>>>>> Stashed changes
		$user = mysqli_query($con, $sql);

        // Xác nhận thông tin đăng nhập có tồn tại trong CSDL không
		if (mysqli_num_rows($user) > 0) {
<<<<<<< Updated upstream
            $_SESSION['username'] = $us;
            project_log($con, "Logged in");
			header("location: ./index.php");
		} else{
			echo "<script>
          var a = document.getElementById('error');
          a.innerHTML = '*Username or password incorrect*';
=======
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
>>>>>>> Stashed changes
				</script>";
		}
		mysqli_close($con);
	}
?>