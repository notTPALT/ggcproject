<?php 
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
    <title>Thêm câu hỏi</title>
</head>
<body>
    <div>
        <h1>Thêm câu hỏi thi thử tốt nghiệp</h1>
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
                <td>Lớp<label style="color: red; font-size: 20px;">*</label></td>
                <td>
                    <select style="height: 25px;" name="Class" id="yourClass" required>
                        <option value="">Hãy chọn lớp</option>
                        <option value="10">Lớp 10</option>
                        <option value="11">Lớp 11</option>
                        <option value="12">Lớp 12</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Giới tính<label style="color: red; font-size: 20px;">*</label></td>
                <td>
                    <input name="gender" type="radio" value="0" checked="true">
                    <label for="">Nam</label>
                    <input name="gender" type="radio" value="1">
                    <label for="" >Nữ</label>
                    <input name="gender" type="radio" value="2" >
                    <label for="">Khác</label>
                </td>
            </tr>
            <tr>
                <td>Email<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="email" type="email" required></td>
            </tr>
            <tr>
                <td>Câu hỏi bảo mật</td>
                <td><input name="secure_question" type="text"></td>
            </tr>
            <tr>
                <td>Câu trả lời bảo mật</td>
                <td><input name="secure_answer" type="text"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input name="phone" type="text"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input name="addrs" type="text"></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                    <input type="date" name="birthdate">
                </td>
            </tr>
            <tr>
                <td>Họ<label style="color: red; font-size: 20px;">*</label></td>
                <td><input name="fname" type="text" required></td>
            </tr>
            <tr>
                <td>Tên<label style="color: red; font-size: 20px;">*</label>    </td>
                <td><input name="lname" type="text" required></td>
            </tr>
            <tr class = "center">
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
        $class = $_POST['Class'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $secure_question = isset($_POST['secure_question'])? $_POST['secure_question']: NULL;
        $secure_answer = isset($_POST['secure_answer'])? $_POST['secure_answer']: NULL;
        $phone = isset($_POST['phone'])? $_POST['phone']: NULL;
        $addrs = isset($_POST['addrs'])? $_POST['addrs']: NULL;
        $birthdate = isset($_POST['birthdate'])? $_POST['birthdate']: NULL;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sql = "INSERT INTO user_infos (username, pass, class, gender, email, secure_question, secure_answer, phone, addrs, birthdate, fname, lname) 
        VALUES ('".$username."', '".$pass."', '".$class."', '".$gender."', '".$email."', '".$secure_question."', '".$secure_answer."', 
        '".$phone."', '".$addrs."', '".$birthdate."', '".$fname."', '".$lname."')";
        $tmp = "SELECT username FROM user_infos WHERE username = '$username'";
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