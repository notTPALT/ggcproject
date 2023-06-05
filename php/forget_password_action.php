<script src="./js/forget_password.js"></script> <!-- Import các function cần thiết -->

<?php

    // Kiểm tra người dùng đã submit form quên mật khẩu chưa
    if (isset($_POST['username'])) {
        // Kiểm tra xem tên tài khoản có tôn tại không
        if (!usernameExist($con, $_POST['username'])) { 
            echo "<script>no_such_user();</script>"; // Thông báo lên giao diện
        } else { 
            // Thực hiện truy vấn lấy câu trả lời từ CSDL
            $stmt = mysqli_prepare($con, "SELECT secure_answer FROM user_infos WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $ans);
            mysqli_stmt_fetch($stmt);

            // Kiểm tra tính chính xác của câu trả lời
            $rightAnswer = ($_POST['secure_answer'] == $ans);
            if ($rightAnswer) $_SESSION['change-pass-username'] = $_POST['username'];
            
            // Thực hiện các thao tác trêm giao diện dựa theo tính chính xác của câu trả lời
            echo '<script>verification_check('.$rightAnswer.');</script>';
        }
    }

    /**
     * Kiểm tra xem tên tài khoản được cho có tồn tại trong CSDL hay không.
     * @param $con Biến thực hiện truy vấn
     * @param $username Tên tài khoản cần kiểm tra
     * @return bool true nếu tồn tại, ngược lại trả về false.
     */
    function usernameExist($con, $username) {
        // Truy vấn đếm số tên tài khoản giống với cái đã cho
        $username_check = mysqli_real_escape_string($con, $username);
        $check = mysqli_prepare($con, "SELECT COUNT(*) FROM user_infos WHERE username = ?");

        if ($check) {
            mysqli_stmt_bind_param($check, "s", $username_check);
            mysqli_stmt_execute($check);
            mysqli_stmt_bind_result($check, $count);
            mysqli_stmt_fetch($check);
            mysqli_stmt_close($check);

            // Trả về true nếu có ít nhất 1 tên giống
            return ($count > 0);
        } else {
            return false;
        }    
    }
?>