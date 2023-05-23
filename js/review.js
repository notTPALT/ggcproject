var arr = [];
var num_of_ques = 0;
var correct = 0;

//Hiển thị tiêu đề chương
function update_chapter_title(level, chapter) {
    if (level != 0)
        document.getElementById("chapter-name").innerHTML = document.getElementById("_" + level + "_" + chapter).innerHTML;
}

//Thêm các event cho nút nộp bài
function update_button_events(level, chapter) {
    document.getElementById("submit").addEventListener("click", () => {
        document.getElementById("content-box").scrollTop = 0;
        window.scrollTo(0,0);
        update_result(level, chapter);
    });
}

//Hiển thị nút sang chương tiếp theo
function show_chapter_navigation_buttons(level, chapter) {
    let cur_chap = chapter;
    let cur_level = level;

    //Chỉ có lớp 12 có 8 chương nên sẽ kiểm tra xem tới chương cuối chưa
    if (chapter == 8) {
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./mock_exam_ready.php';");
    } else {
        if (chapter == 7 && level != 12) {
            chapter = 1;
            level++;
        } else {
            chapter++;
        }
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./review.php?level=" + level + "&chapter=" + chapter + "';");
    }

    if (cur_chap != 1) {
        cur_chap--;
    } else {
        cur_chap = 7;
        cur_level--;
    }
    if (cur_level < 10) {
        document.getElementById("submit").setAttribute("onclick", "window.location.href='./index.php';");
    } else {
        document.getElementById("submit").setAttribute("onclick", "window.location.href='./review.php?level=" + cur_level + "&chapter=" + cur_chap + "';");
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
        xhr_getRightAns.open('POST', '../php/review_check_answer.php', true);
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
    show_chapter_navigation_buttons(level, chapter);
    document.getElementById("submit").innerHTML = "Chương trước đó";

    //Kiểm tra số kết quả đúng, đánh dấu câu trả lời sai
    for (let i = 1; i <= num_of_ques; i++) {
        await update_correct_answer(level, chapter, i);
    }
    document.getElementById("result").innerHTML = "Đúng " + correct + "/" + num_of_ques +
        ".<br>Điểm: " + (correct / num_of_ques) * 10;

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
    var push_HTML = '<div class="question"><label id="ques_' + index + '" for=""><p class="ques-index">Câu ' + index + ':</p> ' + question +
        '<br></label><input type="radio" id="input_' + index + '_1" class="option" name="ans' + index +
        '" value="1"><label for="input_' + index + '_1" class="lbl_testAnswer">A. ' + option1 +
        '<br></label><input type="radio" id="input_' + index + '_2" class="option" name="ans' + index +
        '" value="2"><label for="input_' + index + '_2" class="lbl_testAnswer">B. ' + option2 +
        '<br></label><input type="radio" id="input_' + index + '_3" class="option" name="ans' + index +
        '" value="3"><label for="input_' + index + '_3" class="lbl_testAnswer">C. ' + option3 +
        '<br></label><input type="radio" id="input_' + index + '_4" class="option" name="ans' + index +
        '" value="4"><label for="input_' + index + '_4" class="lbl_testAnswer">D. ' + option4 + '<br></label></div>';
    if (image_path !== 'none') {
        var image_HTML = '<div><img class="ques_img" src="../resources/ques_images/' + image_path + '" alt="Ques_IMG"></div>';
        document.getElementById("question-container").innerHTML += image_HTML;
    }
    document.getElementById("question-container").innerHTML += push_HTML;
    num_of_ques++;
}