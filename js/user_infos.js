function update_username(username) {
    document.getElementById("target").innerHTML += username;
}

function bind_existing_data(fname, lname, gender, birthdate, email, phone, addrs, secur_ques, secur_ans) {
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("fname").innerHTML = fname;
        document.getElementById("lname").innerHTML = lname;
        document.getElementById("gender").innerHTML = gender === "1" ? "Nữ" : "Nam";
        document.getElementById("birthdate").innerHTML = birthdate;
        document.getElementById("email").innerHTML = email;
        document.getElementById("phone").innerHTML = phone;
        document.getElementById("addrs").innerHTML = addrs;
        document.getElementById("secur-ques").innerHTML = secur_ques;
        document.getElementById("secur-ans").innerHTML = secur_ans;
    });
}