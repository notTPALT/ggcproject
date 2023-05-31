<?php
	if (isset($_POST['submit'])){
	$i=1;
	$right_answer=0;
	$wrong_answer=0;
	$unanswered=0;
	$respon = "SELECT * FROM ".$test."";
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
	$sql_result = "INSERT INTO mock_exam_history (username, correct, incorrect, unanswered, point_total) 
					VALUES ('".$_SESSION['username']."', $right_answer, $wrong_answer, $unanswered, $point)";

	$sql_delete = "DROP TABLE ".$test."";
	if (mysqli_query($con, $sql_result) && mysqli_query($con, $sql_delete))
		echo "<script>
				localStorage.clear();
				location.href = 'mock_exam_result.php';
			</script>";
	}
?>