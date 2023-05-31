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
    <title>Cập nhật tài khoản admin</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <div>
        <h1>Cập nhật tài khoản admin</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <?php
            $id = isset($_POST['id']) ? $_POST['id'] : "OK";
            $sql = "SELECT * FROM tb_admin WHERE id = '$id'";
            $tmp = mysqli_query($con, $sql);
            $res = mysqli_fetch_array($tmp);
        ?>
            <tr>
                <td>Tài khoản</td>
                <td><input name="username" rows="4" cols="50" value="<?php echo $res['username']; ?>" required></input>
                </td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input name="pass" rows="4" cols="50" value="<?php echo $res['pass']; ?>" required></input></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input name="phone" rows="4" cols="50" value="<?php echo $res['phone']; ?>"></input></td>
            </tr>
            <tr>
                <td>Họ đệm</td>
                <td><input name="fname" rows="4" cols="50" value="<?php echo $res['fname']; ?>"></input></td>
            </tr>
            <tr>
                <td>Tên</td>
                <td><input name="lname" rows="4" cols="50" value="<?php echo $res['lname']; ?>"></input></td>
            </tr>
            <tr>
                <td colspan="3" class="center"><input type="submit" name="update" value="Cập nhật"></td>
            </tr>
        </table>
        <input type="text" name="tmp" value="<?php echo $res['id']; ?>" hidden></input>
    </form>
</body>

</html>
<?php
    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $tmp = $_POST['tmp'];

        $sql = "UPDATE tb_admin
                SET username = '$username', pass = '$pass', phone = '$phone', fname = '$fname', lname = '$lname'
                WHERE id = '$tmp'";

        if (mysqli_query($con, $sql)){
            echo '<script>
                    alert("Cập nhật tài khoản admin thành công");
                    window.close();
                    window.opener.location.reload();
                </script>';
        }
        else{
            echo '<script>
                    alert("Cập nhật tài khoản admin thất bại");
                    window.close();
                    window.opener.location.reload();
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