<script src="./js/forget_password.js"></script>
<?php
    if (isset($_POST['change-pass'])) {
        if (!usernameExist($con)) {
            echo "<script>no_such_user();</script>";
        } else if (!passwordExist($con)) {
            echo "<script>no_such_password();</script>";
        }
        else {
            if ($_POST['new-pass'] == $_POST['re-enter-new-pass']) {
                if ($_POST['username'])
                $lmao = $_POST['pass'];
                mysqli_query($con, "UPDATE user_infos SET pass = '".$_POST['new-pass']."' WHERE username = '".$_POST['username']."';");
                echo '<script>alert("Đổi mật khẩu thành công!"); window.location.href = "./index.php";</script>';
                unset($_SESSION['change-pass']);
            } else {
                echo '<script>document.getElementById("pass-check").innerHTML = "Hai mật khẩu không giống nhau";</script>';
            }
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
    function passwordExist($con) {
        $password = mysqli_real_escape_string($con, $_POST['new-pass']);
        $check = mysqli_prepare($con, "SELECT pass FROM user_infos WHERE username = ?");

        if ($check) {
            mysqli_stmt_bind_param($check, "s", $password);
            mysqli_stmt_execute($check);
            mysqli_stmt_bind_result($check, $correct_pass);
            mysqli_stmt_fetch($check);
            mysqli_stmt_close($check);
            return ($correct_pass == $password);
        } else {
            return false;
        }    
    }
?>