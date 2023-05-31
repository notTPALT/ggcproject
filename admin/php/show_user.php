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
    <title>Xem tài khoản</title>
    <link rel="stylesheet" href="./css/form.css">
</head>
<?php
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    $sql = "SELECT * FROM user_infos WHERE id = '$id'";
    $tmp = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($tmp);
?>

<body>

    <div>
        <h1>Xem tài khoản</h1>
    </div>
    <form>
        <table>
            <tr>
                <td style="width: 5%;">Tài khoản</td>
                <td style="width: 30%;"><label><?php echo $res['username']; ?></label></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><label><?php echo $res['pass']; ?></label></td>
            </tr>
            <tr>
                <td>Họ</td>
                <td><label><?php echo $res['fname']; ?></label></td>
            </tr>
            <tr>
                <td>Tên</td>
                <td><label><?php echo $res['lname']; ?></label></td>
            </tr>
            <tr>
                <td>Lớp</td>
                <td><label><?php echo $res['class']; ?></label></td>
            </tr>
            <tr>
                <td>Câu hỏi bảo mật</td>
                <td><label><?php echo $res['secure_question']; ?></label></td>
            </tr>
            <tr>
                <td>Câu trả lời bảo mật</td>
                <td><label><?php echo $res['secure_answer']; ?></label></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><label><?php echo $res['email']; ?></label></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><label><?php echo $res['phone']; ?></label></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><label><?php echo $res['addrs']; ?></label></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><label><?php if ($res['gender'] == 1) echo "Nữ"; else if ($res['gender'] == 0) echo "Nam"; else echo "Khác"; ?></label>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><label><?php echo $res['birthdate']; ?></label></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php 
    } 
    else{
        header("HTTP/1.0 404 Not Found");
        header("Location: error_404.html");
        exit();
    }
?>