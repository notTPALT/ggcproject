<<<<<<< Updated upstream
//Thêm username vào tiêu đề
=======
/**
 * Cập nhật tên tài khoản lên tiêu đề
 * @param {string} username Tên tài khoản
 */
>>>>>>> Stashed changes
function update_username(username) {
    document.getElementById("target").innerHTML += username;
}

//Cập nhật dữ liệu có sẵn của người dùng trong SQL 
function bind_existing_data(fname, lname, gender, birthdate, email, phone, addrs, secure_question, secure_answer) {
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("fname").innerHTML = fname;
        document.getElementById("lname").innerHTML = lname;
        document.getElementById("gender").innerHTML = gender === "1" ? "Nữ" : "Nam";
        document.getElementById("birthdate").innerHTML = birthdate;
        document.getElementById("email").innerHTML = email;
        document.getElementById("phone").innerHTML = phone;
        document.getElementById("addrs").innerHTML = addrs;
        document.getElementById("secure-question").innerHTML = secure_question;
        document.getElementById("secure-answer").innerHTML = secure_answer;
    });
}