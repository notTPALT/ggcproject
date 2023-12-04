<<<<<<< Updated upstream
//Thực hiện khi không có người dùng trong cơ sở dữ liệu
=======
/**
 * Trả về dòng thông báo sai tên tài khoản.
 */
>>>>>>> Stashed changes
function no_such_user() {
    document.getElementById("verification-check").innerHTML = "Tên tài khoản không tồn tại";
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
<<<<<<< Updated upstream
}
=======
}

// Thêm event lấy câu hỏi bảo mật cho trường nhập tên tài khoản
document.getElementById("username").addEventListener("input", () => {
    var checkingUsername = document.getElementById("username").value;

    // Dùng XHR để lấy câu hỏi
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/get_secure_question.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send("checkingUsername=" + checkingUsername);

    xhr.onload = () => {
        // Kiểm tra thử AJAX call có thành công hay không
        if (xhr.status === 200) { 
            var question = xhr.responseText;
            // Cập nhật câu hỏi lên giao diện         
            document.getElementById("question").value = question;
        } else {
            console.error("Request failed with status:", xhr.status);
        }
    };
});
>>>>>>> Stashed changes
