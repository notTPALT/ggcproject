<!-- unfinished - not functioning -->

<script src="../js/forget_password.js"></script>

<?php
    if (!usernameExist($con)) {
        echo "<script>no_such_user();</script>";
    }
    if (isset($_POST['username']) && isset($_POST['secur_ques']) && isset($_POST['secur_ans'])) {
        $stmt = mysqli_prepare($con, "SELECT secur_ans FROM user_infos WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $answer);
        if (!mysqli_stmt_fetch($stmt)) {
            echo "<script>user_has_no_ques();</script>";
        }

        if ($_POST['secur_ans'] == $ans) {
            echo 'verification_success();</script>';
        } else {
            echo 'verification_fail();</script>';
        }
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