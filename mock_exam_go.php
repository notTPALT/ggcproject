<?php
    session_start();
	if (isset($_SESSION['username'])){
        require_once("./php/connect_MySQL_n_log.php");
        require_once 'php/create_exam.php';
        
        // Timer
        $userName = $_SESSION['username'];
        $sql = "SELECT status FROM user_infos WHERE username = '$userName'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($result);
        $status = $result['status'];
    
        if ($status == 0) {
            $sql = "UPDATE user_infos
                    SET status = '1'
                    WHERE username = '$userName'";
            mysqli_query($con, $sql);

            // kiểm tra người dùng đã làm bài thi chưa
            // nếu chưa thì đây là lần đầu người dùng thì
            // ngược lại tăng lần thi lên 1
            $sql = "SELECT max(ordinal) as max_ordinal FROM mock_exam_history WHERE username =  '$userName'";
            $result = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($result);
            $count = 0;
            if ($result['max_ordinal'] !== null) {
                $count = $result['max_ordinal'] + 1;
            }

            // set thời gian bắt đầu làm bài thi
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // echo date("Y/m/d H:i:s", strtotime("now")) . "\n";
            $timeEnd = date("Y/m/d H:i:s", strtotime("+40 minutes"));
            $sql = "INSERT INTO mock_exam_history(username, time_end, point_total, ordinal) 
                    VALUES('$userName', '$timeEnd', '0', '$count')";
            mysqli_query($con, $sql);
        }
        $sql = "SELECT time_end
                FROM mock_exam_history
                where username = '$userName'
                ORDER BY ordinal DESC
                limit 1";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_array($result);
        $dateTime = strtotime($result['time_end']);
        $getDateTime = date("F d, Y H:i:s", $dateTime);

        // Process submit
        if (isset($_POST['sub'])){
            $i = 1;
            $right_answer = 0;
            $wrong_answer = 0;
            $unanswered = 0;
            $respon = "SELECT * FROM ".$test;
            $mys = mysqli_query($con, $respon);
            while($result = mysqli_fetch_array($mys)){ 
                if(isset($_POST["$i"]) && $result['answer'] == $_POST["$i"]){
                    $right_answer++;
                }else if(isset($_POST["$i"]) && $_POST["$i"] == "e"){
                    $unanswered++;
                }
                else{
                    $wrong_answer++;
                }
                $i++;
            }
            $point = $right_answer * 0.25;
            $s = mysqli_fetch_array(mysqli_query($con, "SELECT max(ordinal) as LON FROM mock_exam_history WHERE username = '$userName'"));
            $ok = $s['LON'];
            $sql_result = "UPDATE mock_exam_history SET correct = '$right_answer', incorrect = '$wrong_answer', 
            unanswered = '$unanswered', point_total = $point, time_finish = CURRENT_TIMESTAMP WHERE ordinal = '$ok' and username = '$userName'";
            $_SESSION['correct'] = $right_answer;
            $_SESSION['incorrect'] = $wrong_answer;
            $_SESSION['unanswered'] = $unanswered;
            $_SESSION['point'] = $point;
            
            $sql_delete = "DROP TABLE ".$test;        
            $sql_update = "UPDATE user_infos SET status = '0'
                        WHERE username = '$userName'";
            
            if (mysqli_query($con, $sql_result) && mysqli_query($con, $sql_delete) && mysqli_query($con, $sql_update)){
                echo "<script>
                localStorage.clear();
                location.href = './mock_exam_result.php';
                </script>";    
            } else {
                echo "error";
            }
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

    <!-- List question -->
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
                    <td><input type="radio" name="<?php echo $res['id'] ?>"
                            value="a"><strong>A.</strong><?php echo $res['option_a'] ?></td>
                </tr>
                <tr>
                    <td><input type="radio" name="<?php echo $res['id'] ?>"
                            value="b"><strong>B.</strong><?php echo $res['option_b'] ?></td>
                </tr>
                <tr>
                    <td><input type="radio" name="<?php echo $res['id'] ?>"
                            value="c"><strong>C.</strong><?php echo $res['option_c'] ?></td>
                </tr>
                <tr>
                    <td><input type="radio" name="<?php echo $res['id'] ?>"
                            value="d"><strong>D.</strong><?php echo $res['option_d'] ?></td>
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

    <!-- Direct question -->
    <div class="layout-3">
        <button class="myButton" onclick="prev()" style="float:left;">Câu trước</button>
        <div style="margin: 0 auto;"></div>
        <button class="myButton" onclick="next()" style="float:right;">Câu tiếp theo</button>
    </div>

    <!-- List button question -->
    <div class="layout-4">
        Chọn câu hỏi<br>
        <?php
            for ($i = 1; $i <= ceil($numberPage / $numberInforInAPage); $i++){
                echo '<button class="btn_toQues" id="btn_toQues'.$i.'" onclick = "open_ques('.$i.');">'.$i.'</button>';
                if ($i % 10 == 0)
                    echo "<br>";
            }
		?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    document.getElementById("1").hidden = false;
    reload_user_input();
    $(document).ready(function() {
        // set thời gian động 
        let countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();

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
<?php } else {
    echo "<script>location.href = './login.php';</script>";
}?>