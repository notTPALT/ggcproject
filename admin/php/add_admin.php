<?php 
    session_start();
    if (isset($_SESSION['admin'])){
    require('../../php/connect_MySQL_n_log.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../resources/favicon.png">
    <link rel="stylesheet" href="../css/form.css">
    <title>Thêm tài khoản admin</title>
</head>

<body>
    <div>
        <h1>Thêm tài khoản admin</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td style="color: red; font-size: 15px;" colspan="2">Phần có dấu (*) là bắt buộc</td>
            </tr>
            <tr>
                <td>Tài khoản<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="username" type="text" required></td>
            </tr>
            <tr>
                <td>Mật khẩu<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="pass" type="text" required></td>
            </tr>
            <tr>
                <td>Số điện thoại<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="phone" type="text" required></td>
            </tr>
            <tr>
            <tr>
                <td>Họ<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="fname" type="text" required></td>
            </tr>
            <tr>
                <td>Tên<label style="color: red; font-size: 20px;">*</label> </td>
                <td><input name="lname" type="text" required></td>
            </tr>
            <tr class="center">
                <td colspan="2"><input type="submit" name="add" value="Thêm"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
    if(isset($_POST['add'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sql = "INSERT INTO tb_admin (username, pass, fname, lname, phone) 
                VALUES ('".$username."', '".$pass."', '".$fname."', '".$lname."', '".$phone."')";

        $tmp = "SELECT username FROM tb_admin WHERE username = '$username'";

        if (mysqli_num_rows(mysqli_query($con, $tmp)) > 0){
            echo '<script>
                alert("Tài khoản đã tồn tại");
            </script>';
        }
        else if (mysqli_query($con, $sql)){
            echo '<script>
                alert("Thêm tài khoản thành công");
                window.opener.location.reload();
                window.close();
                </script>';
        }
        else{
            echo '<script>
                alert("Thêm tài khoản thất bại");
                window.opener.location.reload();
                window.close();
                </script>';
        }
    }
    } 
    else{
        header("HTTP/1.0 404 Not Found");
        header("Location: error_404.html");
        exit();
    }
?>