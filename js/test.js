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

function push_question(index, question, option1, option2, option3, option4) {
    var push_HTML = '<div><label for="">Câu ' + index + ': ' + question + '</label><input type="radio" class="option" name="ans' + index + '" value="1">A. ' + option1 + '</input><input type="radio" class="option" name="ans' + index + '" value="2">B. ' + option2 + '</input><input type="radio" class="option" name="ans' + index + '" value="3">C. ' + option3 + '</input><input type="radio" class="option" name="ans' + index + '" value="4">D. ' + option4 + '</input></div>';
    document.getElementById("question-container").innerHTML += push_HTML;
}