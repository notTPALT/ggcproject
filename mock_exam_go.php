<?php
    session_start();
    require_once("./php/connect_MySQL_n_log.php");
	require_once 'php/create_exam.php';
	if (isset($_SESSION['username'])){
?>

<!-- Process submit -->
<?php
	if (isset($_POST['sub'])){
		$i=1;
		$right_answer=0;
		$wrong_answer=0;
		$unanswered=0;
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

<<<<<<< Updated upstream
		$point = $right_answer * 0.25;
		$sql_result = "INSERT INTO mock_exam_history VALUES ('".$_SESSION['username']."', $right_answer, $wrong_answer, $unanswered, '$point')";
		$_SESSION['correct'] = $right_answer;
		$_SESSION['incorrect'] = $wrong_answer;
		$_SESSION['unanswered'] = $unanswered;
		$_SESSION['point'] = $point;
		$sql_delete = "DROP TABLE ".$test;
=======
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
>>>>>>> Stashed changes
        
		if (mysqli_query($con, $sql_result) && mysqli_query($con, $sql_delete)){
			echo "<script>
			localStorage.clear();
			location.href = './mock_exam_result.php';
			</script>";    
		} else {
            echo "error";
        }
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
    <script>
    // window.addEventListener("beforeunload", function(event) {
    //     var naviType = String(performance.getEntriesByType("navigation")[0].type);
    //     if (naviType !== "reload") {
    //         var confirmMessage =
    //             "Bạn có chắc không? Việc này sẽ được tính là bỏ thi và bạn sẽ bị đánh 0 điểm vào lịch sử thi thử của bạn.";

    //         event.preventDefault();
    //         event.returnValue = confirmMessage;
    //         return confirmMessage;
    //     }
    // });

    // const xhrCall = () => {
    //     return new Promise((resolve, reject) => {
    //         var xhr_handleClosingMockExam = new XMLHttpRequest();
    //         xhr_handleClosingMockExam.open('POST', './php/handle_closing_mock_exam.php');
    //         xhr_handleClosingMockExam.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //         xhr_handleClosingMockExam.send();
    //         console.log(xhr_handleClosingMockExam.response);
    //         resolve("");
    //     });
    // }
    // window.addEventListener("unload", async function(event) {
    //     var naviType = String(performance.getEntriesByType("navigation")[0].type);
    //     if (naviType !== "reload") {
    //         localStorage.clear();
    //         await xhrCall();
    //     };
    // });

    // function confirmSubmit() {
    //     let confirmAction = confirm("Bạn có muốn nộp bài không?");
    //     console.log(confirmAction);
    //     if (confirmAction) {

    //         window.location.href = "./mock_exam_result.php";
    //     } else {

    //     }
    // }
    </script>
    <p class="title"><b>Test trắc nghiệm THPT môn Vật Lý - GGC<b></p>

    <div class="timer">
        Thời gian còn lại: <span id="countdown"></span>
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
            <input type="submit" name="sub" style="float:center;" value="Nộp bài" onclick="confirmSubmit();">
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

<<<<<<< Updated upstream
=======
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
>>>>>>> Stashed changes
    <script>
    document.getElementById("1").hidden = false;
    reload_user_input();
    </script>

</body>

</html>