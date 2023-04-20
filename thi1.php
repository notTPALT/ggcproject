<!DOCTYPE html>
<html>
<head>
	<title>Trang thi trắc nghiệm</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}
		.container {
			margin: 0 auto;
			max-width: 800px;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}
		h1 {
			
			background-color: #9400D3;
			text-align: center;
			margin-top: 0;
			height: 100px
		}
		form {
			margin-bottom: 20px;
		}
		.question {
			margin-bottom: 10px;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		input[type="radio"] {
			margin-right: 5px;
		}
		input[type="submit"] {
			display: block;
			margin: 0 auto;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}
		.timer {
			text-align: center;
			margin-bottom: 10px;
		}
		.timer span {
			font-size: 20px;
			font-weight: bold;
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1><br>Trang thi trắc nghiệm tốt nghiệp Vật Lý GGC</h1>
		<?php
			$questions = array(
				1 => array(
					'question' => 'Câu hỏi số 1: 	',
					'choices' => array(
						'A' => 'Lựa chọn A',
						'B' => 'Lựa chọn B',
						'C' => 'Lựa chọn C',
						'D' => 'Lựa chọn D'
					),
					'correct_answer' => 'A'
				),
				2 => array(
					'question' => 'Câu hỏi số 2',
					'choices' => array(
						'A' => 'Lựa chọn A',
						'B' => 'Lựa chọn B',
						'C' => 'Lựa chọn C',
						'D' => 'Lựa chọn D'
					),
					'correct_answer' => 'B'
				),
				//Thêm 38 câu hỏi ở đây
				40 => array(
					'question' => 'Câu hỏi số 40',
					'choices' => array(
						'A' => 'Lựa chọn A',
						'B' => 'Lựa chọn B',
						'C' => 'Lựa chọn C',
						'D' => 'Lựa chọn D'
					),
					'correct_answer' => 'C'
				)
			);
					if (isset($_POST['answers'])) {
			$answers = $_POST['answers'];

			//Tính điểm
			$score = 0;
			foreach ($answers as $question_number => $answer) {
				if ($answer == $questions[$question_number]['correct_answer']) {
					$score++;
				}
			}

			//Hiển thị kết quả
			echo "<h2>Kết quả</h2>";
			echo "<p>Số câu trả lời đúng: " . $score . "/40</p>";
			exit();
		}
	?>
	<form method="post" action="">
		<?php
			//Hiển thị câu hỏi và các phương án trả lời
			foreach ($questions as $question_number => $question) {
				echo "<div class='question'>";
				echo "<h3>" . $question['question'] . "</h3>";

				foreach ($question['choices'] as $choice_number => $choice) {
					echo "<label>";
					echo "<input type='radio' name='answers[" . $question_number . "]' value='" . $choice_number . "'>";
					echo $choice;
					echo "</label>";
				}

				echo "</div>";
			}
		?>
		<input type="submit" value="Nộp bài">
	</form>
	<div class="timer">
		Thời gian còn lại: <span id="countdown"></span>
	</div>
</div>

<script>
	//Đếm ngược thời gian
	var timeLeft = 600; //10 phút
	var countdown = setInterval(function() {
		timeLeft--;
		document.getElementById("countdown").innerHTML = Math.floor(timeLeft/60) + ":" + timeLeft%60;

		if (timeLeft == 0) {
			clearInterval(countdown);
			alert("Hết thời gian làm bài!");
			document.querySelector("input[type=submit]").click();
		}
	}, 1000);
</script>
</body>
</html>

