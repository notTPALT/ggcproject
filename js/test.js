var arr = [];
var num_of_ques = 0;
var correct = 0;
var timer_init = 3600; //Thời gian làm bài mặc định

//Ẩn đi form ôn tập khi chưa nhấn bắt đầu
document.getElementById("question-container").hidden = true;
document.getElementById("submit").hidden = true;

// function update_breadcumb(level, chapter) {
//     var gllevel = level;
//     if (level == 0) {
//         document.getElementById("breadcumb").innerHTML = "Trang chủ >> Ôn thi tổng hợp";
//     } else {
//         document.getElementById("breadcumb").innerHTML = "Trang chủ >> Lớp " + level + " >> Chương " + chapter;
//     }
// }

//Hiển thị tiêu đề chương
function update_chapter_title(level, chapter) {
    if (level != 0)
        document.getElementById("chapter-name").innerHTML = document.getElementById("_" + level + "_" + chapter).innerHTML;
}

//Thêm các event cho 2 nút bắt đầu làm bài và nộp bài
function update_button_events(level, chapter) {
    document.getElementById("btn-start-timer").addEventListener("click", timer_start);
    document.getElementById("submit").addEventListener("click", () => {
        update_result(level, chapter);
    });
}

//Hiển thị nút sang chương tiếp theo
function show_next_chapter_button(level, chapter) {
    //Chỉ có lớp 12 có 8 chương nên sẽ kiểm tra xem tới chương cuối chưa
    if (chapter != 8) {
        if (chapter == 7 && level != 12) {
            chapter = 1;
            level++;
        } else chapter++;
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./test.php?level=" + level + "&chapter=" + chapter + "';");
    } else {
        //Chuyển tới trang ôn thi tốt nghiệp sau khi đẫ ôn tập chương cuối
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./mock_exam_ready.php';");
    }

    document.getElementById("next-chapter").hidden = false;
    document.getElementById("next-chapter").innerHTML = "Chương tiếp theo";
}

//Cập nhật số lượng câu đúng, đánh dấu câu sai
//NOTE: Ở đây dùng Promise với async, await để tạm dừng script cho đến khi thực hiện xong đoạn lệnh này 
const update_correct_answer = (level, chapter, i) =>
    new Promise(function(resolve, reject) {
        xhr_getRightAns = new XMLHttpRequest();
        //Lấy input người dùng chọn
        let user_ans = document.querySelector('input[name="ans' + i + '"]:checked');
        //Lấy label của input trên 
        let chosen_ans_label = document.querySelector('label[for="input_' + i + '_' + get_ans_value(i) +'"]');

        //XMLHttpRequest để lấy đáp án câu hỏi từ SQL
        xhr_getRightAns.open('POST', '../php/test_check_ans.php', true);
        xhr_getRightAns.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr_getRightAns.send('ques_index=' + i + '&level=' + level + '&chapter=' + chapter);
        xhr_getRightAns.onload = function() {
            if (xhr_getRightAns.status == 200) {
                if (!user_ans) { //Nếu như người dùng bỏ câu hỏi thì xem như sai và đánh dấu màu vàng
                    let right_ans_label = document.querySelector('label[for="input_' + i + '_' + xhr_getRightAns.response + '"]');
                    right_ans_label.style.color = "brown";
                } else if (parseInt(xhr_getRightAns.response) == user_ans.value) { //Trùng đáp án
                    correct++;

                    chosen_ans_label.style.color = "green";
                } else { //Trật đáp án
                    chosen_ans_label.style.color = "red";
                    let right_ans_label = document.querySelector('label[for="input_' + i + '_' + xhr_getRightAns.response + '"]');
                    right_ans_label.style.color = "green";
                }
                resolve("");
            } else {
                reject("");
            }
        };
    });

//Hiển thị kết quả ôn tập
const update_result = async (level, chapter) => {
    //Ẩn đi 2 components 'timer' và 'submit'
    document.getElementById("timer").hidden = true;
    document.getElementById("submit").hidden = true;

    show_next_chapter_button(level, chapter);

    //Kiểm tra số kết quả đúng, đánh dấu câu trả lời sai
    for (let i = 1; i <= num_of_ques; i++) {
        await update_correct_answer(level, chapter, i);
    }
    document.getElementById("result").innerHTML = "Đúng " + correct + "/" + num_of_ques +
        ".<br>Điểm trên hệ số 10: " + (correct / num_of_ques) * 10;

    //Dùng XMLHttpRequest để lưu dữ liệu ôn tập chương lần này
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/result_log.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('level=' + level + '&chapter=' + chapter + '&correct=' + correct + '&total=' + num_of_ques +
        '&score=' + (correct / num_of_ques) * 10);
}

//Trả về giá trị đã chọn của 1 câu hỏi
function get_ans_value(i) {
    let user_ans = document.querySelector('input[name="ans' + i + '"]:checked');
    if (user_ans !== null) {
        return user_ans.value;
    }
    return null;
}

//Hiển thị câu hỏi lấy được từ SQL
function push_question(index, question, option1, option2, option3, option4, image_path) {
    var push_HTML = '<div><label for="">Câu ' + index + ': ' + question +
        '<br></label><input type="radio" id="input_' + index + '_1" class="option" name="ans' + index +
        '" value="1"><label for="input_' + index + '_1">A. ' + option1 +
        '<br></label><input type="radio" id="input_' + index + '_2" class="option" name="ans' + index +
        '" value="2"><label for="input_' + index + '_2">B. ' + option2 +
        '<br></label><input type="radio" id="input_' + index + '_3" class="option" name="ans' + index +
        '" value="3"><label for="input_' + index + '_3">C. ' + option3 +
        '<br></label><input type="radio" id="input_' + index + '_4" class="option" name="ans' + index +
        '" value="4"><label for="input_' + index + '_4">D. ' + option4 + '<br></label></div>';
    if (image_path !== 'none') {
        var image_HTML = '<div><img class="ques_img" src="../resources/ques_images/' + image_path + '" alt="Ques_IMG"></div>';
        document.getElementById("question-container").innerHTML += image_HTML;
    }
    document.getElementById("question-container").innerHTML += push_HTML;
    num_of_ques++;
}

//Bắt đâu tính giờ
function timer_start() {
    document.getElementById("btn-start-timer").hidden = true;
    document.getElementById("question-container").hidden = false;
    document.getElementById("submit").hidden = false;

    let timer = timer_init;
    let second = timer_init;
    let hour = parseInt(second / 3600);
    second -= hour * 3600;
    let minute = parseInt(second / 60);
    second -= minute * 60;

    var timer_countdown = setInterval(function() {
        timer--;

        second--;
        if (second < 0) {
            minute--;
            if (minute < 0) {
                if (hour > 0) hour--;
                minute = 59;
            }
            second = 59;
        }

        document.getElementById("timer").innerHTML = "Thời gian còn lại: " + hour + ":" + minute +
            ":" + second;
        if (timer <= 0) {
            clearInterval(timer_countdown);
            time_out();
        }
    }, 1000);
}

//Tự động submit khi hết giờ
function time_out() {
    let countdown = 3;
    let count = setInterval(function() {
        document.getElementById("submit").hidden = true;
        document.getElementById("timer").innerHTML =
            "Đã hết thời gian làm bài! Hiển thị kết quả sau " + countdown + " giây.";
        if (countdown == 0) {
            clearInterval(count);
            document.getElementById("submit").click();
        }
        countdown--;
    }, 1000);
}