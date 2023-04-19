<!-- unfinished - not functioning -->

<script src="../js/forget_password.js"></script>

<?php
    if (isset($_POST['username']) && !usernameExist($con)) {
        echo "<script>no_such_user();</script>";
    }
    else if (isset($_POST['username'])) {
        $stmt = mysqli_prepare($con, "SELECT secur_ques, secur_ans FROM user_infos WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $ques, $ans);
        mysqli_stmt_fetch($stmt);
        $success = ($_POST['secur_ans'] == $ans);
        if ($success) $_SESSION['change-pass-username'] = $_POST['username']; 
        echo '<script>verification_check('.$success.');</script>';
    }
    function usernameExist($con) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $check = mysqli_prepare($con, "SELECT COUNT(*) FROM user_infos WHERE username = ?");

        if ($check) {
            mysqli_stmt_bind_param($check, "s", $username);
            mysqli_stmt_execute($check);
            mysqli_stmt_bind_result($check, $count);
            mysqli_stmt_fetch($check);
            mysqli_stmt_close($check);
            return ($count > 0);
        } else {
            return false;
        }    
    }
?>