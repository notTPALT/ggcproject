<?php
    if (isset($_SESSION['change-pass-username'])) {
        if (isset($_POST['pass']))
        if ($_POST['pass'] == $_POST['rpass']) {
            $lmao = $_POST['pass'];
            mysqli_query($con, "UPDATE user_infos SET pass = '".$_POST['pass']."' WHERE username = '".$_SESSION['change-pass-username']."';");
            echo '<script>window.location.href = "../login.php";</script>';
        } else {
            echo '<script>document.getElementById("pass-check").innerHTML = "Hai mật khẩu không giống nhau";</script>';
        }
    }
?>