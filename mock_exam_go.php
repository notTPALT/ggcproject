<?php
    session_start();
	include 'php/create_exam.php';
	if (isset($_SESSION['username'])){
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="css/style_graduation.css">
    <script src="js/script_graduation.js"></script>
</head>

<body onload="reload_user_input()">
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
					echo '<script>document.getElementById("1").hidden = false;</script>';
					echo '<script>reload_user_input();</script>';
					?>
            <input type="submit" name="sub" style="float:center;" value="Nộp bài">
        </form>
    </div>

    <!-- Direct question -->
    <div class="layout-3">
        <button class="myButton" onclick="prev()" style="float:left;">Câu trước</button>
        <button class="myButton" style="margin: 0 auto; background-color: rgba(105, 105, 105, 0); z-index: 1" disabled
            hidden></button>
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
</body>

</html>

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
		echo $right_answer;
		echo " ".$unanswered;

		$point = $right_answer * 0.25;
		$sql_result = "INSERT INTO mock_exam_history (username, correct, incorrect, unanswered, point_total) 
						VALUES ('".$_SESSION['username']."', $right_answer, $wrong_answer, $unanswered, $point)";
		$_SESSION['correct'] = $right_answer;
		$_SESSION['incorrect'] = $wrong_answer;
		$_SESSION['unanswered'] = $unanswered;
		$_SESSION['point'] = $point;
		$sql_delete = "DROP TABLE ".$test."";
		if (mysqli_query($con, $sql_result) && mysqli_query($con, $sql_delete)){
			echo "<script>
			localStorage.clear();
			location.href = 'mock_exam_result.php';
			</script>";
		}
	}
	}
?>