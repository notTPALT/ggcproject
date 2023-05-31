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
    <title>Cập nhật tài khoản</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <div>
        <h1>Cập nhật tài khoản</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <?php
            $id = isset($_POST['id']) ? $_POST['id'] : "OK";
            $sql = "SELECT * FROM user_infos WHERE id = '$id'";
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
                <td>Lớp</td>
                <td><input name="Class" rows="4" cols="50" value="<?php echo $res['class']; ?>"></input></td>
            </tr>
            <tr>
                <td>Câu hỏi bảo mật</td>
                <td><input name="secure_question" rows="4" cols="50"
                        value="<?php echo $res['secure_question']; ?>"></input></td>
            </tr>
            <tr>
                <td>Câu trả lời bảo mật</td>
                <td><input name="secure_answer" rows="4" cols="50" value="<?php echo $res['secure_answer']; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="email" rows="4" cols="50" value="<?php echo $res['email']; ?>"></input></td>
            </tr>

            <tr>
                <td>Số điện thoại</td>
                <td><input name="phone" rows="4" cols="50" value="<?php echo $res['phone']; ?>"></input></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input name="addrs" rows="4" cols="50" value="<?php echo $res['addrs']; ?>"></input></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input name="gender" rows="4" cols="50" value="<?php echo $res['gender']; ?>"></input></td>
                <td><label>0 - Nam | 1 - Nữ | 2 - Khác</label></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><input name="birthdate" type="date" rows="4" cols="50"
                        value="<?php echo $res['birthdate']; ?>"></input></td>
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
        $class = $_POST['Class'];
        $secure_question = $_POST['secure_question'];
        $secure_answer = $_POST['secure_answer'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $addrs = $_POST['addrs'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $tmp = $_POST['tmp'];

        $sql = "UPDATE user_infos
                SET username = '$username', pass = '$pass', class = '$class', secure_question = '$secure_question', 
                secure_answer = '$secure_answer', email = '$email', phone = '$phone', addrs = '$addrs', 
                gender = '$gender', birthdate = '$birthdate', fname = '$fname', lname = '$lname'
                WHERE id = '$tmp'";

        if (mysqli_query($con, $sql)){
            echo '<script>
                    alert("Cập nhật tài khoản thành công");
                    window.close();
                    window.opener.location.reload();
                </script>';
        }
        else{
            echo '<script>
                    alert("Cập nhật tài khoản thất bại");
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