<script src="./js/change_user_infos.js"></script>

<?php
    if (isset($_SESSION['username'])) {
        if (isset($_POST['change-user-infos'])) {
            $update_data_stmt = mysqli_prepare($con, "UPDATE user_infos SET fname = ?, lname = ?, gender = ?, birthdate = ?, email = ?, phone = ?, addrs = ?, secur_ques = ?, secur_ans = ? WHERE username = '".$_SESSION['username']."'");
    
            if ($update_data_stmt) {
                mysqli_stmt_bind_param($update_data_stmt, "sssssssss", $_POST['fname'], $_POST['lname'], $_POST['gender'], $_POST['birthdate'], $_POST['email'], $_POST['phone'], $_POST['addrs'], $_POST['secur-ques'], $_POST['secur-ans']);
                if (!mysqli_stmt_execute($update_data_stmt)) {
                    echo "Error!";
                }
                else echo '<script>alert("Thay đổi thông tin thành công!"); window.location.href = "./index.php";</script>';
                mysqli_stmt_close($update_data_stmt);
            }
        }
        echo "<script>update_username('".$_SESSION['username']."');</script>";   
        $get_user_data_stmt = mysqli_prepare($con, "SELECT secur_ques, secur_ans, email, phone, addrs, gender, birthdate, fname, lname FROM user_infos WHERE username = '".$_SESSION['username']."'");
    
        if ($get_user_data_stmt) {
            mysqli_stmt_execute($get_user_data_stmt);
            mysqli_stmt_bind_result($get_user_data_stmt, $secur_ques, $secur_ans, $email, $phone, $addrs, $gender, $birthdate, $fname, $lname);
            mysqli_stmt_fetch($get_user_data_stmt);
            if (!$fname) {
                echo "Error: ";
            }
            echo '<script>bind_existing_data("'.$fname.'", "'.$lname.'", "'.$gender.'", "'.$birthdate.'", "'.$email.'", "'.$phone.'", "'.$addrs.'", "'.$secur_ques.'", "'.$secur_ans.'");</script>';
            mysqli_stmt_close($get_user_data_stmt);
        }
    }
?>