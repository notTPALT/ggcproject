//Thưc hiện khi đăng kí thành công
function register_success() {
    document.getElementById("register-status").innerHTML = "Đăng ký thành công.";

    var count = 3;
    
    var interval = setInterval(function() {
        document.getElementById("countdown").innerHTML = "Về trang đăng nhập trong " + count + " giây...";
        if (count == 0) {
            clearInterval(interval);
            location.href="./login.php";
        }    
        count--;
    }, 1000);
}

function username_already_exists() {
    document.getElementById("username-availablity-check").innerHTML = "Tài khoản đã tồn tại.";
}

function not_same_password() {
    document.getElementById("rpass-check").innerHTML = "Không giống mật khẩu.";
}

function login_success() {
    location.href="./index.php";
}

function login_fail() {
    document.getElementById("login-status").innerHTML = "Đăng nhập thất bại.";
}