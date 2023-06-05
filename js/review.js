var arr = [];
var num_of_ques = 0;
var correct = 0;

//Hiển thị nút sang chương tiếp theo
function show_next_chapter_button(level, chapter) {
    //Chỉ có lớp 12 có 8 chương nên sẽ kiểm tra xem tới chương cuối chưa
    if (chapter != 8) {
        if (chapter == 7 && level != 12) {
            chapter = 1;
            level++;
        } else chapter++;
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./review.php?level=" + level + "&chapter=" + chapter + "';");
    } else {
        //Chuyển tới trang ôn thi tốt nghiệp sau khi đẫ ôn tập chương cuối
        document.getElementById("next-chapter").setAttribute("onclick", "window.location.href='./mock_exam_ready.php';");
    }

    document.getElementById("next-chapter").hidden = false;
    document.getElementById("next-chapter").innerHTML = "Chương tiếp theo";
}

//Cập nhật số lượng câu đúng, tô màu các câu đúng, sai hoặc không chọn
//NOTE: Ở đây dùng Promise với async, await để tạm dừng script cho đến khi thực hiện xong đoạn lệnh đấy
const update_correct_answer = (level, chapter, i) =>
    new Promise(function(resolve, reject) {
        xhr_getRightAns = new XMLHttpRequest();
        //Lấy câu trả lời từ người dùng
        let user_ans = document.querySelector('input[name="ans' + i + '"]:checked');
        //Lấy label của input trên 
        let chosen_ans_label = document.querySelector('label[for="input_' + i + '_' + get_ans_value(i) +'"]');

        //XMLHttpRequest để lấy đáp án câu hỏi từ CSDL
        xhr_getRightAns.open('POST', '../php/review_check_ans.php', true);
        xhr_getRightAns.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr_getRightAns.send('ques_index=' + i + '&level=' + level + '&chapter=' + chapter);
        xhr_getRightAns.onload = function() {
            if (xhr_getRightAns.status == 200) {
                if (!user_ans) { //Nếu như người dùng bỏ câu hỏi thì xem như sai và đánh dấu màu nâu
                    let right_ans_label = document.querySelector('label[for="input_' + i + '_' + xhr_getRightAns.response + '"]');
                    right_ans_label.style.color = "brown";
                    right_ans_label.style.fontWeight = "bold";
                } else if (parseInt(xhr_getRightAns.response) == user_ans.value) { // Đúng
                    correct++;
                    chosen_ans_label.style.fontWeight = "bold";
                    chosen_ans_label.style.color = "green";
                } else { // Sai 
                    chosen_ans_label.style.color = "red";
                    chosen_ans_label.style.fontWeight = "bold";
                    let right_ans_label = document.querySelector('label[for="input_' + i + '_' + xhr_getRightAns.response + '"]');
                    right_ans_label.style.color = "green";
                    right_ans_label.style.fontWeight = "bold";
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
    document.getElementById("submit").hidden = true;

    show_next_chapter_button(level, chapter);

    //Kiểm tra số kết quả đúng, đánh dấu câu trả lời sai
    for (let i = 1; i <= num_of_ques; i++) {
        await update_correct_answer(level, chapter, i);
    }

    let point = ((correct / num_of_ques) * 10).toFixed(1);
    document.getElementById("result").innerHTML = "Đúng " + correct + "/" + num_of_ques +
        ".    Điểm: " + point;

    //Dùng XMLHttpRequest để lưu dữ liệu ôn tập chương lần này
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../php/result_log.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('level=' + level + '&chapter=' + chapter + '&correct=' + correct + '&total=' + num_of_ques +
        '&score=' + point);
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