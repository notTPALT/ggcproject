var cur_ques = 1;

//
function changeButtonColor(id) {
    var bt = document.getElementById("btn_toQues" + id);
    bt.style.backgroundColor = "orange";
    localStorage.setItem("answered_" + id, true);
}

function addInputEvent(tableID) {
    var table = document.getElementById(tableID);
    table.addEventListener("change", function () {
        var answer = table.querySelector('input[name="' + tableID +'"]:checked');
        if (answer) {
            localStorage.setItem("user_ans_" + tableID, answer.value);
            changeButtonColor(tableID);
        }
    });
}

function reload_user_input() {
    // Load user's previous answers from localStorage
    for (var i = 1; i <= 40; i++) {
        var key = "user_ans_" + i;
        var value = localStorage.getItem(key);

        if (value !== null) {
            var input = document.querySelector('input[name="' + i + '"][value="' + value + '"]');
            if (input) {
                input.checked = true;
                changeButtonColor(i);
            }
        }
    }

    // Check if questions have been answered and update button color
    for (var i = 1; i <= 40; i++) {
        var key = "answered_" + i;
        var value = localStorage.getItem(key);
        if (value !== null) {
            changeButtonColor(i);
        }
    }

    // Countdown timer
    function startCountdown(duration, display) {
        var timer = duration, minutes, seconds, hours;

        var submitButton = document.querySelector('input[name="sub"]');

        // Check if time is saved in localStorage
        var timeLeft = localStorage.getItem("timeLeft");
        if (timeLeft && !isNaN(timeLeft)) timer = parseInt(timeLeft, 10);

        var intervalId = setInterval(function () {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hours + " giờ " + minutes + " phút " + seconds + " giây";

            if (--timer < 0) {
                clearInterval(intervalId);
                // Delete 'timeLeft' from localStorage
                localStorage.removeItem("timeLeft");

                // Click submit button
                submitButton.click();
            } else {
                // Save time remaining to localStorage
                localStorage.setItem("timeLeft", timer);
            }
        }, 1000);
    }

        window.onload = function () {
        var duration = 40 * 60; // Set time limit to 40 minutes
        var display = document.querySelector("#countdown");
        startCountdown(duration, display);
    };

    // Reset time when page is refreshed
    var timeLeft = localStorage.getItem("timeLeft");
    if (timeLeft && !isNaN(timeLeft)) {
        var duration = parseInt(timeLeft);
        var display = document.querySelector("#countdown");
        startCountdown(duration, display);
    }
}

function open_ques(id) {
    var id_cl = parseInt(id);
    cur_ques = id_cl;

    for (var i = 1; i <= 40; i++) {
        document.getElementById(i).hidden = true;
    }

    document.getElementById(id_cl).hidden = false;
}

// Button navigation
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



