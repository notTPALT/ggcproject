<?php
// Chuyển hướng nếu chưa đăng nhập
if (isset($_SESSION['username'])){
	$test = "tbtest_".$_SESSION['username']; // Tên của bảng chứa bộ câu hỏi cho người dùng hiện tại

	// Query strings dùng để lấy câu hỏi từ bảng chứa, được sắp xếp ngẫu nhiên,
	// giới hạn 40 câu.
	$createContainer = "CREATE TABLE $test LIKE tbquestion_graduation";
	$fillByQuestionSet = "INSERT INTO $test (question, option_a, option_b, option_c, option_d, answer)
						SELECT question, option_a, option_b, option_c, option_d, answer 
						FROM tbquestion_graduation ORDER BY RAND() LIMIT 40";
	
	// Chỉ thực hiện fill khi tạo bảng thành công (thứ sẽ trả về false khi bảng đã tồn tại)
	if (mysqli_query($con, $createContainer)) {
		mysqli_query($con, $fillByQuestionSet);
	}
}
else {
	echo '<script>location.href="./login.php"</script>';
}
?>