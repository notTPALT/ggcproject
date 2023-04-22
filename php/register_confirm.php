<script src="./js/register.js"></script>

<?php
    if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['email'])) {
        if (usernameExist($con)) {
            echo '<script>username_already_exists();</script>';
        } else if ($_POST['rpass'] != $_POST['pass']) {
            echo '<script>not_same_password();</script>';
        } else insert_data($con);
    }

    function usernameExist($con) {
        $username = $_POST['username'];
        $check_stmt = mysqli_prepare($con, "SELECT COUNT(*) FROM user_infos WHERE username = ?");
        if ($check_stmt) {
            mysqli_stmt_bind_param($check_stmt, "s", $username);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_bind_result($check_stmt, $count);
            $success = mysqli_stmt_fetch($check_stmt);
            mysqli_stmt_close($check_stmt);
            return ($success && $count > 0);
        } else {
            return false;
        }
    }
    
    function insert_data($con) {
        $insert_stmt = mysqli_prepare($con, "insert into user_infos (username, pass, secur_ques, secur_ans, email, phone, addrs, gender, birthdate, fname, lname) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $insert_stmt = mysqli_prepare($con, "insert into user_infos (username, pass, email) values (?, ?, ?)");
    
        $username   = $_POST['username'];
        $pass       = $_POST['pass'];
        $secur_ques = $_POST['secur_ques'];
        $secur_ans  = $_POST['secur_ans'];
        $phone      = isset($_POST['phone'])     ? $_POST['phone']     : null;
        $email      = isset($_POST['email'])     ? $_POST['email']     : null;
        $address    = isset($_POST['address'])   ? $_POST['address']   : null;
        $fname      = isset($_POST['fname'])     ? $_POST['fname']     : null;
        $lname      = isset($_POST['lname'])     ? $_POST['lname']     : null;
        $birthdate  = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        $gender = (isset($_POST['gender']) && strcmp("male", $_POST['gender']) == 0) ? true : false;
    
        mysqli_stmt_bind_param($insert_stmt, "sssssssbsss", $username, $pass, $secur_ques, $secur_ans, $email, $phone, $address, $gender, $birthdate, $fname, $lname);
        // mysqli_stmt_bind_param($insert_stmt, "sss", $_POST['username'], $_POST['pass'], $_POST['email']);
        mysqli_stmt_execute($insert_stmt); 
    
        //Run this script if registered successfully
        echo '<script>register_success();</script>';
        
        foreach ($_POST as $key => $value) {
            unset($_POST[$key]);
        }
    }
?>