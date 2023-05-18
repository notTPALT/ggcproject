<?php
    session_start();
    require('./php/connect_MySQL_n_log.php');
?>
<?php
	if (isset($_POST['signup'])) {
		$username     = $_POST['taikhoan'];
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
			echo "<script>;
                var a = document.getElementById('error_username');
                a.innerHTML = '*Username đã tồn tại*';
				</script>";
		}
		else{
			if ($password == $repassword){
                // $_SESSION['username'] = $username;
				mysqli_query($con, $sql);
                project_log_no_username($con, "Added an account: ".$username);
				header('location: ./php/wait.php');
			} 
			else{
				echo "<script>
                        var b = document.getElementById('error_password');
                        b.innerHTML = '*Mật khẩu không khớp*';
					</script>";
			}
		}
		mysqli_close($con);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="css/style_form.css">
    <style>
    .container {
        width: 500px;
        height: 550px;
    }

    table {
        transform: translateX(60px);
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
        width: 192px;
        height: 25px;
        background-color: #a39393;
        border: none;
        margin: 13px 0px 13px 18px;
    }
    </style>
</head>

<body>
    <div class="container">
        <input type="submit" style="margin-left: 40px;width: 40px;height: 40px;padding: 10px 10px;" id="btn_homepage"
            onclick="location.href='./index.php'" value="🏠">
        <form action="" method="POST" name="sign-out">
            <label for="" style="font-size: 28px;">Sign up</label>
            <table>
                <tr>
                    <td>
                        <label for="">Username:</label>
                    </td>

                    <td>
                        <input type="text" id="username" name="taikhoan" size="30" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p style="color: red; font-size: 15px; margin-left: 200px;" id="error_username"></p>
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
                        <label for="">Re-en password: </label>
                    </td>

                    <td>
                        <input type="password" id="repassword" name="rematkhau" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <p style="color: red; font-size: 15px; margin-left: 200px;" id="error_password"></p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="yourClass">Class:</label>
                    </td>

                    <td>
                        <select name="Class" id="yourClass" required>
                            <option value="">Hãy chọn lớp </option>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="gender" style="font-size: 20px;">Gender:</label>
                    </td>

                    <td>
                        <input name="gender" type="radio" value="0" checked="true">
                        <label for="">Nam</label>

                        <input name="gender" type="radio" value="1">
                        <label for="">Nữ</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="mail">Mail:</label>
                    </td>

                    <td>
                        <input type="email" name="email" id="mail" size="30" required>
                    </td>
                </tr>
            </table>
            <input type="submit" name="signup" id="sign-out_person" value="Sign up">
        </form>
    </div>
</body>

</html>