<?php
	if (isset($_SESSION['username'])){
	$numberInforInAPage = 1;
	$numberPage = 40;
	$sql = "SELECT * FROM tbquestion_graduation ORDER BY RAND() LIMIT {$numberPage}";

	$test = "tbtest_".$_SESSION['username']."";
	
	$createTB = "CREATE TABLE ".$test."
	(
		id       INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question VARCHAR(255) NOT NULL, 
        option_a VARCHAR(255) NOT NULL, 
        option_b VARCHAR(255) NOT NULL, 
        option_c VARCHAR(255) NOT NULL, 
        option_d VARCHAR(255) NOT NULL, 
        answer   VARCHAR(2) NOT NULL
	)
	";
	$tmp1 = mysqli_query($con, $sql);
	
	if (!mysqli_query($con, $createTB)){
		// Đã tạo bảng
        // Truyền data vào bảng mới
		if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM ".$test)) == 0){
			while($res = mysqli_fetch_array($tmp1)){
				$insert = "INSERT INTO ".$test." (question, option_a, option_b, option_c, option_d, answer) VALUES ('".$res['question']."', 
				'".$res['option_a']."', '".$res['option_b']."', '".$res['option_c']."', '".$res['option_d']."', '".$res['answer']."')";
				mysqli_query($con, $insert);
			}
			echo "OKO";
		}
    }
    else{
		// Ngược lại chưa tạo
		// Tạo
        mysqli_query($con, $createTB);
        // Truyền data vào bảng mới
		if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM ".$test."")) == 0){
			while($res = mysqli_fetch_array($tmp1)){
				$insert = "INSERT INTO ".$test." (question, option_a, option_b, option_c, option_d, answer) VALUES ('".$res['question']."', 
				'".$res['option_a']."', '".$res['option_b']."', '".$res['option_c']."', '".$res['option_d']."', '".$res['answer']."')";
				mysqli_query($con, $insert);
			}
		}
    }
	}
	else{
		echo "Hãy đăng nhập để test ";
		echo "<a href='mock_exam_ready.php'><label>Trở về</label></a>";
	}
?>