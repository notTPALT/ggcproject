var arr = [];
var num_of_ques = 0;
var timer_init = 10;
var timer = timer_init;

var hour = 0, second = timer, minute = 0;
hour = parseInt(second / 3600);
second -= hour * 3600;
minute = parseInt(second / 60);
second -= minute * 60;

document.getElementById("question-container").hidden = true;
document.getElementById("submit").hidden = true;

function update_breadcumb(level, chapter) {
    if (level == 0) {
        document.getElementById("breadcumb").innerHTML = "Trang chủ >> Ôn thi tổng hợp"
    } else {
        document.getElementById("breadcumb").innerHTML = "Trang chủ >> Lớp " + level + " >> Chương " + chapter;
    }
}

function update_chapter_title(level, chapter) {
    if (level != 0) 
        document.getElementById("chapter-name").innerHTML = document.getElementById("_" + level + "_" + chapter).innerHTML;
}

function update_button_events() {
    document.getElementById("btn-start-timer").addEventListener("click", timer_start);
    document.getElementById("submit").addEventListener("click", update_result);
}

function update_result() {
    document.getElementById("timer").hidden = true;
    document.getElementById("submit").hidden = true;
    let correct = 0;
    for (let i = 1; i <= num_of_ques; i++) {
        let user_ans = document.querySelector('input[name="ans' + i + '"]:checked');
        if (user_ans !== null && arr[i-1] === user_ans.value) correct++;
    }
    document.getElementById("result").innerHTML = "Đúng " + correct + "/" + num_of_ques + ".<br>Điểm trên hệ số 10: " + (correct / num_of_ques) * 10;
}


function push_question(index, question, option1, option2, option3, option4, ans) {
    var push_HTML = '<div><label for="">Câu ' + index + ': ' + question + '</label><input type="radio" class="option" name="ans' + index + '" value="1">A. ' + option1 + '</input><input type="radio" class="option" name="ans' + index + '" value="2">B. ' + option2 + '</input><input type="radio" class="option" name="ans' + index + '" value="3">C. ' + option3 + '</input><input type="radio" class="option" name="ans' + index + '" value="4">D. ' + option4 + '</input></div>';
    document.getElementById("question-container").innerHTML += push_HTML;
    num_of_ques++;
    arr.push(ans);
}



function timer_start() {
    document.getElementById("btn-start-timer").hidden = true;
    document.getElementById("question-container").hidden = false;
    document.getElementById("submit").hidden = false;
    timer = timer_init;
    var myInterval = setInterval(function() {
        timer--;
        
        second--;
        if (second < 0) {
            minute--;
            if (minute < 0) {
                hour--;
                minute = 59;
            } else {
                minute--;
            }
            second = 59;
        }
        
        document.getElementById("timer").innerHTML = "Thời gian còn lại: " + hour + ":" + minute + ":" + second;
        if (timer <= 0) {
            clearInterval(myInterval);
            time_out();
        }
    }, 1000);
}

function time_out() {
    let countdown = 3;
    let count = setInterval(function() {
        document.getElementById("submit").hidden = true;
        document.getElementById("timer").innerHTML = "Đã hết thời gian làm bài! Hiển thị kết quả sau " + countdown + " giây.";
        if (countdown == 0) {
            clearInterval(count);
            document.getElementById("submit").click();
        }
        countdown--;
    }, 1000);
}

