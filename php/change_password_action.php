<script src="./js/forget_password.js"></script> <!-- Import các function cần thiết cho file -->
<?php
    // Chuyển hướng sang trang đăng nhập nếu như tự ý vào trang khi chưa đăng nhập
    if (!$_SESSION['username']) {
        echo "<script>location.href = './login.php'</script>";
    }

    // Chạy block này nếu như người dùng đã submit mật khẩu mới
    if (isset($_POST['new-pass'])) {

        // Kiểm tra xem mật khẩu cũ do người dùng nhập có giống với trong CSDL không
        if (!passwordExist($con, $_POST['old-pass'])) {
            // Thông báo cho người dùng nếu 2 mật khẩu không giống nhau
            echo "<script>no_such_password();</script>";
        }
        else {
            // Kiểm tra xem có nhập lại đúng mật khẩu mới không
            if ($_POST['new-pass'] == $_POST['re-enter-new-pass']) {
                // Cập nhật mật khẩu mới và thông báo cho người dùng
                mysqli_query($con, "UPDATE user_infos SET pass = '".$_POST['new-pass']."' WHERE username = '".$_SESSION['username']."';");
                echo '<script>alert("Đổi mật khẩu thành công!"); window.location.href = "./index.php";</script>';

                project_log($con, "Changed password");
                unset($_POST['change-pass']); // Tránh các lỗi sau này
            } else {
                // Thông báo cho người dùng nếu 2 mật khẩu nhập lại không giống nhau
                echo '<script>document.getElementById("pass-check").innerHTML = "Hai mật khẩu không giống nhau";</script>';
            }
        }
    }

    /**
     * Kiểm tra xem mật khẩu cũ do người dùng nhập có trùng với của database không
     *
     * @param mixed $con Biến kết nối tới CSDL
     * @param int $old_pass Mật khẩu cũ do người dùng tự nhập
     * @return mixed true nếu 2 mật khẩu giồng nhau, còn lại trả về false.
     */
    function passwordExist($con, $old_pass) {
        // Thực hiên truy vấn lấy mật khẩu cũ từ CSDL
        $check = mysqli_prepare($con, "SELECT pass FROM user_infos WHERE username = ?");

        if ($check !== false) {
            mysqli_stmt_bind_param($check, "s", $_SESSION['username']);
            mysqli_stmt_execute($check);
            mysqli_stmt_bind_result($check, $correct_pass);
            mysqli_stmt_fetch($check);
            mysqli_stmt_close($check);
            
            // Trả về true nếu giống nhau, ngược lại trả về false
            return ($correct_pass == $old_pass);
        } else {
            return false;
        }    
    }
?>