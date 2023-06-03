<script src="./js/user_infos.js"></script>

<?php
    // Enough commenting for this thing
    if (!isset($_SESSION['username'])) {
        echo '<script>location.href = "./login.php";<script>';
    }
    
    // Magic thing, I wonder what it does...
    echo "<script>update_username('".$_SESSION['username']."');</script>";

    // Lấy thông tin cá nhân từ CSDL
    $get_user_data_stmt = mysqli_prepare($con, "SELECT secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname FROM user_infos WHERE username = '".$_SESSION['username']."'");

    if ($get_user_data_stmt) {
        mysqli_stmt_execute($get_user_data_stmt);
        mysqli_stmt_bind_result($get_user_data_stmt, $secure_question, $secure_answer, $email, $phone, $addrs, $gender, $birthdate, $fname, $lname);
        mysqli_stmt_fetch($get_user_data_stmt);
        // Đưa lên giao diện
        echo '<script>bind_existing_data("'.$fname.'", "'.$lname.'", "'.$gender.'", "'.$birthdate.'", "'.$email.'", "'.$phone.'", "'.$addrs.'", "'.$secure_question.'", "'.$secure_answer.'");</script>';
        mysqli_stmt_close($get_user_data_stmt);
    }
?>