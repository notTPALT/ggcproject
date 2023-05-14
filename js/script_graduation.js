var cur_ques = 1;

//Thay đổi màu của các nút câu hỏi đã trả lời trước đó
function changeButtonColor(id) {
    var bt = document.getElementById("btn_toQues" + id);
    bt.style.backgroundColor = "orange";
    localStorage.setItem("answered_" + id, true);
}

//Thêm sự kiện khi có đáp án được chọn cho từng câu hỏi
function addInputEvent(tableID) {
    document.getElementById(tableID).addEventListener('input', function() {
        //Check lại các câu trả lời
        let answer = document.querySelector('input[name="' + tableID + '"]:checked');
        if (answer) {
            //Đổi giá trị trong locaStorage sang giá trị mới
            localStorage.setItem("user_ans_" + tableID, answer.value);
            //Thay đổi màu nút của câu hỏi này
            changeButtonColor(tableID);
        }
    });
}

//Cập nhật lại các câu đã trả lời trước đó
function reload_user_input() {
    //Duyệt từng giá trị trong localStorage
    for (let data of Object.entries(localStorage)) {
        //Dối với wampserver, trong localStorage sẽ có 1 vài key đặc biệt. 
        //Vì vậy dùng dòng này để loại bỏ cấc key không mong muốn.
        if (!data[0].startsWith("user_ans_")) {
            continue;
        }

        //Lấy phần số của ID câu hỏi (ID của từng câu hỏi chỉ là số chỉ đến thứ tự câu hỏi)
        let dedicatedID = parseInt(data[0].substring(9));

        //Lấy câu trả lời
        let answer = data[1];

        //Tìm element cần thiết và cập nhật lại tình trạng
        let inputElement = document.getElementById(dedicatedID).querySelector('input[value="' + answer + '"]');
        if (inputElement) {
            inputElement.checked = true;
            changeButtonColor(dedicatedID); 
        }
    }

    // //Check question have answer? when page refresh then update button color
    // for (let i = 1; i <= 40; i++) {
    //     if(localStorage.getItem("answered_" + i)) {
    //         changeButtonColor(i);
    //     }
    // }

    //Timer
    function startCountdown(duration, display) {
        var timer = duration, minutes, seconds, hours;

        var submitButton = document.querySelector('input[name="sub"]');

        //Kiểm tra sự tồn tại của timeLeft trong localStorage
        var timeLeft = localStorage.getItem('timeLeft');
        if (timeLeft && !isNaN(timeLeft)) 
            timer = parseInt(timeLeft, 10);

        //Chuyển đổi timer thành các biến h, m, s để xuât ra màn hình
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
                //Xoá 'timeLeft' trong localStorage
                localStorage.removeItem('timeLeft');
                
                //Tự động submit sau khi hết giờ
                submitButton.click();
            } else {
                //Tự động cập nhật 'timeLeft' sau mỗi giây
                localStorage.setItem('timeLeft', timer);
            }
        }, 1000);
    }

    //Load timer
    window.onload = function() {
        var duration = 40 * 60; //Đặt thời gian làm bài mặc định
        var display = document.querySelector('#countdown');
        startCountdown(duration, display);
    };

    //????? (Chiến giải thích hộ, tại sao lại kiểm tra timeLeft 2 lần trong kho startCountdown đã có?)
    var timeLeft = localStorage.getItem('timeLeft');
    // if have timeLeft in localStorage then run startCountdown
    if (timeLeft && !isNaN(timeLeft)) {
        var duration = parseInt(timeLeft);
        var display = document.querySelector('#countdown');
        startCountdown(duration, display);
    }
}

//Hiển thị câu hỏi ra màn hình theo id
function open_ques(id) {
    let id_cl = parseInt(id);
    cur_ques = id_cl;

    for (let i = 1; i <= 40; i++) {
        document.getElementById(i).hidden = true;
    }

    document.getElementById(id_cl).hidden = false;
}

//Hiển thị câu tiếp theo
function next() {
    if (cur_ques < 40) {
        document.getElementById("btn_toQues" + (cur_ques + 1)).click();
    }
}

//Hiển thị câu trước đó
function prev() {
    if (cur_ques > 1) {
        document.getElementById("btn_toQues" + (cur_ques - 1)).click();
    }
}


