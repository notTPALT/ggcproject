<?php
    // Chuyển trang trang đăng nhập nếu người dùng truy cập thông qua đường dẫn
    // mà chưa trả lời chính xác câu hỏi bảo mật
    if (!isset($_SESSION['change-pass-username'])) {
        echo '<script>window.location.href = "./login.php";</script>';
    } else if (isset($_POST['set-new-pass-submit'])) {
        // Kiểm tra mật khẩu nhập lại có đúng không
        if (isset($_POST['pass']) && $_POST['pass'] == $_POST['rpass']) {
            // Truy vẫn cập nhật mật khẩu mới lên CSDL
            mysqli_query($con, "UPDATE user_infos SET pass = '".$_POST['pass']."' WHERE username = '".$_SESSION['change-pass-username']."';");
    
            project_log($con, "Changed password");
            unset($_SESSION['change-pass-username']);
            
            // Bắt người dùng đăng nhập lại
            echo '<script>window.location.href = "./login.php";</script>';
        } else {
            echo '<script>document.getElementById("pass-check").innerHTML = "* Hai mật khẩu không giống nhau";</script>';
        }
    }
?>