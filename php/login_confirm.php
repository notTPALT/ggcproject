<script src="./js/register.js"></script>

<?php
    if (isset($_POST['username']) && isset($_POST['pass'])) {
        if (accountExist($con)) {
            $_SESSION['username'] = $_POST['username'];
            echo '<script>login_success();</script>;';

            project_log($con, "Logged in");
        } else {
            echo '<script>login_fail();</script>;';
        }
    }
    
    function accountExist($con) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);

        $check = mysqli_prepare($con, "SELECT COUNT(*) FROM user_infos WHERE username = ? AND pass = ?");

        if ($check) {
            mysqli_stmt_bind_param($check, "ss", $username, $pass);
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