<script src="./js/change_user_infos.js"></script> <!-- Import các function cần thiết cho file -->

<?php
    // Kiểm tra tình trạng đăng nhập
    if (isset($_SESSION['username'])) {
        // Chạy block này nếu người dùng đã submit form cập nhật thông tin
        if (isset($_POST['change-user-infos'])) {

            // Thực hiện truy vấn cập nhật thông tin lên database
            $update_data_stmt = mysqli_prepare($con, "UPDATE user_infos SET fname = ?, lname = ?, gender = ?, birthdate = ?, email = ?, phone = ?, addrs = ?, secure_question = ?, secure_answer = ? WHERE username = '".$_SESSION['username']."'");
    
            if ($update_data_stmt) {
                mysqli_stmt_bind_param($update_data_stmt, "sssssssss", $_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['birthdate'], $_POST['email'], $_POST['phone'], $_POST['addrs'], $_POST['secure-question'], $_POST['secure-answer']);
                if (!mysqli_stmt_execute($update_data_stmt)) {
                    echo "Error!"; // Báo lỗi nếu không thể thực hiện truy vấn
                }
                else {
                    project_log($con, "Changed their informations");
                    // Thông báo đã thay đổi thông tin
                    echo '<script>alert("Thay đổi thông tin thành công!"); window.location.href = "./index.php";</script>';
                }
                mysqli_stmt_close($update_data_stmt);
            }
        }

        // Update tiêu đề trang theo tên tài khoản đang đăng nhập
        echo "<script>update_username('".$_SESSION['username']."');</script>"; 
        
        // Truy vấn để lấy thông tin cá nhân có sẵn trên CSDL
        $get_user_data_stmt = mysqli_prepare($con, "SELECT secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname FROM user_infos WHERE username = '".$_SESSION['username']."'");
    
        if ($get_user_data_stmt) {
            mysqli_stmt_execute($get_user_data_stmt);
            mysqli_stmt_bind_result($get_user_data_stmt, $secure_question, $secure_answer, $email, $phone, $addrs, $gender, $birthdate, $fname, $lname);
            mysqli_stmt_fetch($get_user_data_stmt);
            mysqli_stmt_close($get_user_data_stmt);

            // Cập nhật các trường thông tin theo dữ liệu lấy được từ CSDL
            echo '<script>bind_existing_data("'.$fname.'", "'.$lname.'", "'.$gender.'", "'.$birthdate.'", "'.$email.'", "'.$phone.'", "'.$addrs.'", "'.$secure_question.'", "'.$secure_answer.'");</script>';
            
        }
    } else {

        // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        echo '<script>location.href="./login.php";</script>';
    }
?>