<?php
    session_start();
    require_once("./php/connect_MySQL_n_log.php");
    
    // Chuyển hướng sang trang đăng nhập nếu như chưa đăng nhập
	if (!isset($_SESSION['username'])){
        echo "<script>location.href = './login.php';</script>";
    }

    require_once 'php/create_exam.php';

    define('NOT_IN_A_TEST', 0);
    define('IN_A_TEST', 1);
    
    // Lấy status code từ CSDL
    $userName = $_SESSION['username'];
    $sql = "SELECT status FROM user_infos WHERE username = '$userName'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($result);
    $status = $result['status'];

    // Chạy block này nếu đây là đợt thi thử mới
    if ($status == NOT_IN_A_TEST) {

        // Truy vấn cập nhật status
        $sql = "UPDATE user_infos SET status = ".IN_A_TEST." WHERE username = '$userName'";
        mysqli_query($con, $sql);

        // Tăng số lần thi thử lên 1
        $sql = "SELECT max(ordinal) as max_ordinal FROM mock_exam_history WHERE username =  '$userName'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($result);
        $count = 0;

        if ($result['max_ordinal'] !== null) {
            $count = $result['max_ordinal'] + 1;
        }
        else{
            $count = 1;
        }

        // Lấy thời gian kết thúc bài thi (thời gian thi mặc định là 40 phút).
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeEnd = date("Y/m/d H:i:s", strtotime("+40 minutes"));

        // Truy vấn cập nhật thông tin mới vào lịch sử thi
        $sql = "INSERT INTO mock_exam_history(username, time_end, point_total, ordinal) 
                VALUES('$userName', '$timeEnd', '0', '$count')";
        mysqli_query($con, $sql);
    }
    
    // Truy vấn lấy thời gian kết thúc đã lưu trước đó
    $stmt_get_time_end = "SELECT time_end FROM mock_exam_history WHERE username = '$userName'
            ORDER BY ordinal DESC LIMIT 1";
    $result = mysqli_query($con, $stmt_get_time_end);
    $result = mysqli_fetch_array($result);
    $time_end_unix = strtotime($result['time_end']);
    $time_end = date("F d, Y H:i:s", $time_end_unix);

    // Chỉ thực thi khi người dùng đã nộp bài
    if (isset($_POST['sub'])){
        $i = 1; // Thể hiện index của câu trả lời cần kiểm tra
        $right_answer = 0;
        $wrong_answer = 0;
        $unanswered = 0;
        
        // Lấy câu trả lời từ set câu hỏi của người dùng
        // (Sở dĩ không cần lấy index của các câu hỏi là vì index trên giao diện
        // và index trong bộ câu hỏi đều được xếp từ 1->40).
        $respon = "SELECT * FROM ".$test;
        $mys = mysqli_query($con, $respon);

        // $_POST['$i'] chứa câu trả lời cho câu hỏi có index là $i
        while($result = mysqli_fetch_array($mys)){ 
            if(isset($_POST["$i"]) && $result['answer'] == $_POST["$i"]){
                $right_answer++; // +1 nếu trả lời đúng
            }else if(isset($_POST["$i"]) && $_POST["$i"] == "e"){
                $unanswered++; // +1 nếu chưa trả lời (Value mặc định cho mọi câu trả lời là 'e')
            }
            else{
                $wrong_answer++; // +1 nếu trả lời sai
            }
            $i++;
        }

        // Trang mặc định, và sẽ, chỉ có 40 câu hỏi, cho nên điểm sẽ được tính như thế này
        $point = $right_answer * 0.25;

        // IDK why is this code implemented twice, but if it works, it works.
        $max_ordinal_container = mysqli_fetch_array(mysqli_query($con, "SELECT max(ordinal) as max_ordinal FROM mock_exam_history WHERE username = '$userName'"));
        $max_ordinal = $max_ordinal_container['max_ordinal'];
        
        // Truy vấn cập nhật kết quả thi lên lịch sử thi
        $sql_update_result_history = "UPDATE mock_exam_history SET correct = '$right_answer', incorrect = '$wrong_answer', 
        unanswered = '$unanswered', point_total = $point, time_finish = CURRENT_TIMESTAMP WHERE ordinal = '$max_ordinal' and username = '$userName'";

        //Lưu vào session để trang mock_exam_result dùng sau này
        $_SESSION['correct'] = $right_answer;
        $_SESSION['incorrect'] = $wrong_answer;
        $_SESSION['unanswered'] = $unanswered;
        $_SESSION['point'] = $point;
        
        // Truy vấn xóa bộ câu hỏi của lần thi này
        $sql_delete_question_set = "DROP TABLE ".$test;        
        $sql_update_exam_status = "UPDATE user_infos SET status = '0'
                    WHERE username = '$userName'";
        
        // Chỉ khi thực hiện cả 3 truy vấn mới chuyển hướng
        if (mysqli_query($con, $sql_update_result_history) && mysqli_query($con, $sql_delete_question_set) 
            && mysqli_query($con, $sql_update_exam_status)) {
            echo "<script>
            localStorage.clear(); // Xóa để chuẩn bị cho các lần thi sau này
            location.href = './mock_exam_result.php';
            </script>";    
        } else {
            echo "error";
        }
        
        // Log lần thi này
        project_log($con, "Finished a mock exam - Correct: ".$right_answer." Incorrect: ".$wrong_answer." Unanswered: ".$unanswered." Point: ".$point);
    }
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="css/style_graduation.css">
    <link rel="icon" href="./resources/favicon.png">
    <script src="js/script_graduation.js"></script>
</head>

<body>
    <p class="title"><b>Test trắc nghiệm THPT môn Vật Lý - GGC<b></p>

    <div class="timer">
        Thời gian còn lại: <span id="thoigianconlai"></span>
    </div>

    <!-- div chứa nội dung câu hỏi, các câu trả lời và nút nộp bài -->
    <div class="content">
        <?php 
			$sql2 = "SELECT * FROM ".$test."";
			$tmp2 = mysqli_query($con, $sql2);
		?>
        <form action="" method="POST">
            <?php
            $i = 1;
            while($res = mysqli_fetch_array($tmp2)){ ?>
            <table id="<?php echo $res['id'] ?>" hidden>
                <tr>
                    <td><strong>Câu <?php echo $i .". "?></strong><?php echo $res['question'] ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="rdi_<?php echo $i ?>_1" name="<?php echo $res['id'] ?>" value="a">
                        <label for="rdi_<?php echo $i ?>_1" style="cursor: pointer;">
                            <strong>A.</strong><?php echo $res['option_a'] ?></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="rdi_<?php echo $i ?>_2" name="<?php echo $res['id'] ?>" value="b">
                        <label for="rdi_<?php echo $i ?>_2" style="cursor: pointer;">
                            <strong>B.</strong><?php echo $res['option_b'] ?></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="rdi_<?php echo $i ?>_3" name="<?php echo $res['id'] ?>" value="c">
                        <label for="rdi_<?php echo $i ?>_3" style="cursor: pointer;">
                            <strong>C.</strong><?php echo $res['option_c'] ?></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="rdi_<?php echo $i ?>_4" name="<?php echo $res['id'] ?>" value="d">
                        <label for="rdi_<?php echo $i ?>_4" style="cursor: pointer;">
                            <strong>D.</strong><?php echo $res['option_d'] ?></label>
                    </td>
                </tr>
                <tr>
                    <td><input type="radio" value="e" style='display:none' name='<?php echo $res['id'];?>' checked></td>
                </tr>

                <script>
                addInputEvent("<?php echo $res['id'] ?>");
                </script>
            </table>
            <?php 
				$i++;
			}
		?>
            <input type="submit" name="sub" style="float:center;" value="Nộp bài">
        </form>
    </div>

    <!-- div chứa các nút chuyển câu hỏi -->
    <div class="layout-3">
        <button class="myButton" onclick="prev()" style="float:left;">Câu trước</button>
        <div style="margin: 0 auto;"></div>
        <button class="myButton" onclick="next()" style="float:right;">Câu tiếp theo</button>
    </div>

    <!-- div chứa các nút chuyển đến câu hỏi nhất định -->
    <div class="layout-4">
        Chọn câu hỏi<br>
        <?php
            for ($i = 1; $i <= 40; $i++) {
                echo '<button class="btn_toQues" id="btn_toQues'.$i.'" onclick = "open_ques('.$i.');">'.$i.'</button>';
                if ($i % 10 == 0)
                    echo "<br>"; // Đưa hàng nút xuống dòng tiếp theo sau mỗi 10 nút
            }
		?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    document.getElementById("1").hidden = false; // Câu 1 sẽ được hiển thị đầu tiên
    reload_user_input(); // Load lại các câu trả lời mà người dùng đã trả lời trước đó

    document.addEventListener("DOMContentLoaded", () => {
        ////$(document).ready(function() {
        // set thời gian động 
        let countDownDate = new Date("<?php echo "$time_end"; ?>").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;


            document.getElementById("thoigianconlai").innerHTML = hours + " giờ " + minutes + " phút " +
                seconds + " giây";
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("thoigianconlai").innerHTML = "Hết thời gian làm bài";
                var submitButton = document.querySelector('input[name="sub"]');
                submitButton.click();
            }
        }, 200);
    });
    </script>
</body>

</html>