<script src="./js/change_user_infos.js"></script>

<?php
    if (isset($_SESSION['username'])) {
        if (isset($_POST['change-user-infos'])) {
            $update_data_stmt = mysqli_prepare($con, "UPDATE user_infos SET fname = ?, lname = ?, gender = ?, birthdate = ?, email = ?, phone = ?, addrs = ?, secure_question = ?, secure_answer = ? WHERE username = '".$_SESSION['username']."'");
    
            if ($update_data_stmt) {
                mysqli_stmt_bind_param($update_data_stmt, "sssssssss", $_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['birthdate'], $_POST['email'], $_POST['phone'], $_POST['addrs'], $_POST['secure-question'], $_POST['secure-answer']);
                if (!mysqli_stmt_execute($update_data_stmt)) {
                    echo "Error!";
                }
                else {
                    project_log($con, "Changed their informations");
                    echo '<script>alert("Thay đổi thông tin thành công!"); window.location.href = "./index.php";</script>';
                }
                mysqli_stmt_close($update_data_stmt);
            }
        }
<<<<<<< Updated upstream
        echo "<script>update_username('".$_SESSION['username']."');</script>";   
=======

        // Update tiêu đề trang theo tên tài khoản đang đăng nhập
        echo "<script>update_username('".$_SESSION['username']."');</script>"; 
        
        // Truy vấn để lấy thông tin cá nhân có sẵn trên CSDL
>>>>>>> Stashed changes
        $get_user_data_stmt = mysqli_prepare($con, "SELECT secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname FROM user_infos WHERE username = '".$_SESSION['username']."'");
    
        if ($get_user_data_stmt) {
            mysqli_stmt_execute($get_user_data_stmt);
            mysqli_stmt_bind_result($get_user_data_stmt, $secure_question, $secure_answer, $email, $phone, $addrs, $gender, $birthdate, $fname, $lname);
            mysqli_stmt_fetch($get_user_data_stmt);
            echo '<script>bind_existing_data("'.$fname.'", "'.$lname.'", "'.$gender.'", "'.$birthdate.'", "'.$email.'", "'.$phone.'", "'.$addrs.'", "'.$secure_question.'", "'.$secure_answer.'");</script>';
            mysqli_stmt_close($get_user_data_stmt);
        }
    }
?>