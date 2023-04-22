function init_index_buttons(username) {
    if (username == "none") {
        function login() {
            window.location.href = "./login.php";
        }

        function register() {
            window.location.href = "./register.php";
        }

        document.getElementById("btn-login-r-show-username").innerHTML= "Đăng nhập";
        document.getElementById("btn-login-r-show-username").addEventListener("click", login);

        document.getElementById("btn-register-r-log-out").innerHTML= "Đăng ký";
        document.getElementById("btn-register-r-log-out").addEventListener("click", register);

    } else {
        function goto_personal_information() {
            window.location.href = "./personal_information.php";
        }

        function log_out() {
            window.location.href = "./log_out.php";
        }

        document.getElementById("btn-login-r-show-username").innerHTML= "User: " + username;
        document.getElementById("btn-login-r-show-username").addEventListener("click", goto_personal_information);

        document.getElementById("btn-register-r-log-out").innerHTML= "Đăng xuất";
        document.getElementById("btn-register-r-log-out").addEventListener("click", log_out);
    }
}

function index_login_status(username) {
    document.getElementById("login-status").innerHTML = "Thông tin đăng nhập: username=" + username;
}