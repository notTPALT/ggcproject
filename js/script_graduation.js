var cur_ques = 1; // Lưu index câu hỏi hiện tại, mặc định là câu 1

/**
 * It does what it does
 * @param {int} id Số đằng sau id của nút chuyển tới câu hỏi có index là `id`
 */
function changeButtonColor(id) {
    var bt = document.getElementById("btn_toQues" + id);
    bt.style.backgroundColor = "orange";
    localStorage.setItem("answered_" + id, true);
}

/**
 * Thêm event cho 1 bảng câu hỏi để tự động lưu câu trả lời do
 * người dùng chọn vào localStorage
 * @param {any} tableID ID của bảng câu hỏi cần thêm 
 */
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

/**
 * Tải lại các câu trả lời đã lưu trên localStorage
 */
function reload_user_input() {
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
}

/**
 * Hiển thị câu hỏi được chọn.
 * @param {any} id ID của câu hỏi cần hiển thị
 */
function open_ques(id) {
    var id_cl = parseInt(id);
    cur_ques = id_cl;

    // Ẩn hêt tất cả câu hỏi, sau đó hiển thị câu hỏi cần thiết
    for (var i = 1; i <= 40; i++) {
        document.getElementById(i).hidden = true;
    }
    document.getElementById(id_cl).hidden = false;
}

/**
 * Hiển thị câu hỏi tiếp theo
 */
function next() {
    if (cur_ques < 40) {
        document.getElementById("btn_toQues" + (cur_ques + 1)).click();
    }
}

/**
 * Hiển thị câu hỏi trước đó
 */
function prev() {
    if (cur_ques > 1) {
        document.getElementById("btn_toQues" + (cur_ques - 1)).click();
    }
}



