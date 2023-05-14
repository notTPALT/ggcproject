//Thực hiện khi không có người dùng trong cơ sở dữ liệu
function no_such_user() {
    document.getElementById("verification-check").innerHTML = "Tên người dùng không tồn tại";
}
//Tương tự khi mật khẩu sai
function no_such_password() {
    document.getElementById("verification-check").innerHTML = "Sai mật khẩu cũ";
}

//Hiển thị ra khi sai câu trả lời bảo mật hoặc điều hướng sang trang đặt mật khẩu mới
function verification_check(success) {
    if (success) {
        window.location.href = "../set_new_password.php";
    } else {
        document.getElementById("verification-check").innerHTML = "Sai câu trả lời";
    }
}