<!DOCTYPE html>
<html>
<head>
	<title>Trang web thi trắc nghiệm</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Trang web thi trắc nghiệm</h1>
		<div id="quiz">
			<form method="post" action="result.php">
				<?php
					include 'questions.php';
					shuffle($questions); // Trộn thứ tự câu hỏi
					for ($i = 0; $i < count($questions); $i++) {
						$question = $questions[$i];
						echo "<h3>".($i+1).". ".$question['question']."</h3>";
						$choices = $question['choices'];
						shuffle($choices); // Trộn thứ tự các lựa chọn
						foreach ($choices as $choice) {
							echo "<label><input type='radio' name='answers[".$i."]' value='".$choice."'> ".$choice."</label><br>";
						}
					}
				?>
				<br>
				<button type="submit" class="btn">Hoàn thành</button>
			</form>
			<div id="timer">
				<p id="time-left">Thời gian còn lại: <span id="minutes">20</span> phút <span id="seconds">00</span> giây</p>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="timer.js"></script>
</body>
</html>
