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
    <title>Sign in </title>
    <link rel="stylesheet" href="css/style_form.css">
    <style>
    .container {
        width: 470px;
        height: 360px;
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
        background-color: #a39393;
        border: none;
        margin: 3px 0px 0px -50px;
    }

    /*CSS cho chữ của thẻ a*/
    a {
        font-size: 18px;
        color: #a39393;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="sign-up">
            <label for="" style="font-size: 35px;">Sign in</label>
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
    </div>
</body>

</html>
<?php
	if ((isset($_POST["dangnhap"])) && ($_POST['taikhoan'] != '') && ($_POST['matkhau'] != '')){
		$us = $_POST['taikhoan'];
		$ps = $_POST['matkhau'];
		
		$sql = "SELECT COUNT(*) FROM user_infos where username = '$us' and pass = '$ps'";
		
		$user = mysqli_query($con, $sql);

		if (mysqli_fetch_array($user)){
            $_SESSION['username'] = $us;
            project_log($con, "Logged in");
			header("location: ./index.php");
		} else{
			echo "<script>
          var a = document.getElementById('error');
          a.innerHTML = '*Username or password incorrect*';
				</script>";
		}
		mysqli_close($con);
	}
?>