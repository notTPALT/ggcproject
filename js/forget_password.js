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
        // window.location.href = "../set_new_password.php";
        window.location.href = "../set_new_password.php";
    } else {
        document.getElementById("verification-check").innerHTML = "Sai câu trả lời";
    }
}

//AJAX call để lấy câu hỏi dựa trên username
document.getElementById("username").addEventListener("blur", () => {
    var checkingUsername = document.getElementById("username").value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/get_secure_question.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send("checkingUsername=" + checkingUsername);

    xhr.onload = () => {
        if (xhr.status === 200) {
            var question = xhr.responseText;
            document.getElementById("question").value = question;
        } else {
            console.error("Request failed with status:", xhr.status);
        }
    };
});