<script src="./js/forget_password.js"></script>
<?php
    if (isset($_POST['new-pass'])) {
        if (!passwordExist($con)) {
            echo "<script>no_such_password();</script>";
        }
        else {
            if ($_POST['new-pass'] == $_POST['re-enter-new-pass']) {
                mysqli_query($con, "UPDATE user_infos SET pass = '".$_POST['new-pass']."' WHERE username = '".$_SESSION['username']."';");
                echo '<script>alert("Đổi mật khẩu thành công!"); window.location.href = "./index.php";</script>';

                project_log($con, "Changed password");
                unset($_POST['change-pass']);
            } else {
                echo '<script>document.getElementById("pass-check").innerHTML = "Hai mật khẩu không giống nhau";</script>';
            }
        }
    }
    function passwordExist($con) {
        $password = $_POST['old-pass'];
        $check = mysqli_prepare($con, "SELECT pass FROM user_infos WHERE username = ?");

        if ($check !== false) {
            mysqli_stmt_bind_param($check, "s", $_SESSION['username']);
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