var cur_ques = 1;

function changeButtonColor(id) {
    var bt = document.getElementById("btn_toQues" + id);
    bt.style.backgroundColor = "orange";
    localStorage.setItem("answered_" + id, true);
}

function addInputEvent(tableID) {
    document.getElementById(tableID).addEventListener('input', function() {
        let answer = document.querySelector('input[name="' + tableID +'"]:checked');
        if (answer) {
            localStorage.setItem("user_ans_" + tableID, answer.value);
            changeButtonColor(tableID);
        }
    });
}

function reload_user_input() {
    for (let data of Object.entries(localStorage)) {
        if (!data[0].startsWith("user_ans_")) {
            continue;
        }
        let dedicatedID = parseInt(data[0].substring(9));
        let answer = data[1];
        let inputElement = document.getElementById(dedicatedID).querySelector('input[value="' + answer + '"]');
        if (inputElement) {
            inputElement.checked = true;
            changeButtonColor(dedicatedID); 
        }
    }

    // Check question have answer? when page refresh then update button color
    for (let i = 1; i <= 40; i++) {
        if(localStorage.getItem("answered_" + i)) {
            changeButtonColor(i);
        }
    }

    // Timer
    function startCountdown(duration, display) {
        var timer = duration, minutes, seconds, hours;

        var submitButton = document.querySelector('input[name="sub"]');

        // Check time have save in localStorage?
        var timeLeft = localStorage.getItem('timeLeft');
        if (timeLeft && !isNaN(timeLeft)) 
            timer = parseInt(timeLeft, 10);


        var intervalId = setInterval(function() {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10); 

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hours + " giờ " + minutes + " phút " + seconds + " giây";

            if (--timer < 0) {
                clearInterval(intervalId);
                // Delete 'timeLeft' trong localStorage
                localStorage.removeItem('timeLeft');
                
                // Click button submit
                submitButton.click();
            } else {
                // Save time remaining for localStorage
                localStorage.setItem('timeLeft', timer);
            }
        }, 1000);
    }

    window.onload = function() {
        var duration = 40 * 60; // Set time
        var display = document.querySelector('#countdown');
        startCountdown(duration, display);
    };

    // Reset time when page refres
    var timeLeft = localStorage.getItem('timeLeft');
    // if have timeLeft in localStorage then run startCountdown
    if (timeLeft && !isNaN(timeLeft)) {
        var duration = parseInt(timeLeft);
        var display = document.querySelector('#countdown');
        startCountdown(duration, display);
    }
}

function open_ques(id) {
    let id_cl = parseInt(id);
    cur_ques = id_cl;

    for (let i = 1; i <= 40; i++) {
        document.getElementById(i).hidden = true;
    }

    document.getElementById(id_cl).hidden = false;
}

// Button direct
function next() {
    if (cur_ques < 40) {
        document.getElementById("btn_toQues" + (cur_ques + 1)).click();
    }
}

function prev() {
    if (cur_ques > 1) {
        document.getElementById("btn_toQues" + (cur_ques - 1)).click();
    }
}


