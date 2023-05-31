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
    <title>Đăng kí</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="./css/style_form.css">
    <style>
    .container {
        width: 550px;
        height: 550px;
    }

    table {
        transform: translateX(60px);
        height: 400px
    }

    /*CSS cho các label Username, Password, Class, Gender, Mail */
    label {
        font-size: 20px;
    }

    /*CSS cho các dữ liệu đầu vào có dạng text, password, email và select Class*/
    input[type='text'],
    input[type="password"],
    input[type="email"],
    #yourClass {
        width: 230px;
        height: 25px;
        margin: 10px 0px 10px 18px;
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
        <form action="./register.php" method="POST" name="sign-out">
            <label for="" style="font-size: 28px;">Đăng kí</label>
            <table>
                <tr>
                    <td>
                        <label for="">Tài khoản</label>
                    </td>

                    <td>
                        <input type="text" id="username" name="taikhoan" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <p style="color: red; font-size: 18px; margin-left: 200px;" id="error_username"></p>
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
                        <label for="">Nhập lại mật khẩu</label>
                    </td>

                    <td>
                        <input type="password" id="repassword" name="rematkhau" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <p style="color: red; font-size: 18px; margin-left: 200px;" id="error_password"></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="yourClass">Lớp</label>
                    </td>

                    <td>
                        <select name="Class" id="yourClass" required>
                            <option value="">Hãy chọn lớp</option>
                            <option value="class10">Lớp 10</option>
                            <option value="class11">Lớp 11</option>
                            <option value="class12">Lớp 12</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="gender" style="font-size: 20px;">Giới tính</label>
                    </td>

                    <td>
                        <input name="gender" type="radio" value="0" checked="true">
                        <label for="">Nam</label>

                        <input name="gender" type="radio" value="1">
                        <label for="">Nữ</label>

                        <input name="gender" type="radio" value="Khác">
                        <label for="">Khác</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="mail">Email</label>
                    </td>

                    <td>
                        <input type="email" id="mail" name="email" size="30" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="./login.php" style="font-size: 20px;">Bạn đã có tài khoản?</a>
                    </td>
                </tr>
            </table>
            <input type="submit" name="signup" id="sign-out_person" value="Đăng kí">
        </form>
    </div>
</body>

</html>
<?php
	if (isset($_POST['signup'])) {
		$username = $_POST['taikhoan'];
		$password = $_POST['matkhau'];
    $repassword = $_POST['rematkhau'];
    $class = $_POST['Class'];
    $gender = $_POST['gender'];
		$email = $_POST['email'];
    
		$sql = "INSERT INTO user_infos (username, pass, class, gender, email) VALUES ('".$username."', '".$password."', '".$class."', '".$gender."', '".$email."')";
		
		// check username
		$checkUser = "SELECT username FROM user_infos WHERE username = '".$username."'";
		$tmp = mysqli_query($con, $checkUser);
		$dong = mysqli_num_rows($tmp);
		
		if ($dong > 0){
			echo "<script>
            var a = document.getElementById('error_username');
            a.innerHTML = '*Username đã tồn tại*';
				  </script>";
		}
		else{
			if ($password == $repassword){
				mysqli_query($con, $sql);
        project_log_no_username($con, "Added an account: ".$username);
				echo '<script>location.href="./php/wait.php"</script>';
				// header('locaiton: /php/wait.php');
			} 
			else{
				echo "<script>
                var b = document.getElementById('error_password')
                b.innerHTML = '*Mật khẩu không khớp*'
              </script>";
			}
		}
		mysqli_close($con);
	}
?>