document.querySelector("form").addEventListener('input', function() {
    document.getElementById("change-user-infos").disabled = false;
});

function bind_existing_data(fname, lname, gender, birthdate, email, phone, addrs, secure_question, secure_answer) {
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("fname").value = fname;
        document.getElementById("lname").value = lname;
        document.querySelector("input[name='gender'][value='" + gender + "']").checked = true;
        document.getElementById("birthdate").value = birthdate;
        document.getElementById("email").value = email;
        document.getElementById("phone").value = phone;
        document.getElementById("addrs").value = addrs;
        document.getElementById("secure-question").value = secure_question;
        document.getElementById("secure-answer").value = secure_answer;
    });
}

function update_username(username) {
    document.getElementById("target").innerHTML += username;    
}

