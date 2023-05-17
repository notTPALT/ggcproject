<?php
	session_start();
	require_once("./php/connect_MySQL_n_log.php");
	if (isset($_SESSION['correct'])){
	$right_answer = $_SESSION['correct'];
	$wrong_answer = $_SESSION['incorrect'];
	$unanswered = $_SESSION['unanswered'];
	$point = $_SESSION['point'];
	project_log($con, "Finished a mock exam - Correct: ".$right_answer." Incorrect: ".$wrong_answer." Unanswered: ".$unanswered." Point: ".$point);
	unset($_SESSION['correct']);
	unset($_SESSION['incorrect']);
	unset($_SESSION['unanswered']);
	unset($_SESSION['point']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kết quả kiểm tra</title>
    <link rel="icon" href="./resources/favicon.png">
</head>

<body>
    <div class="container">
        <a href=""><img class="logo" src="./resources/favicon.png" alt="Logo"></a>
        <div class="result">
            <p style="font-size: 30px;text-align:center;"><b>Kết quả bài TEST: </b><?php echo $_SESSION['username']; ?>
            </p>
            <p>Số câu trả lời đúng <span class="space"></span>: <span class="space"></span><?php echo $right_answer; ?>
            </p>
            <p>Số câu trả lời sai<span class="space"></span><span class="space"></span>: <span
                    class="space"></span><?php echo $wrong_answer; ?></p>
            <p>Số câu để trống <span class="space"></span> <span class="space"></span>: <span
                    class="space"></span><?php echo $unanswered; ?></p>
            <p>Điểm <span class="space"></span> <span class="space"></span> <span class="space"></span> <span
                    class="space"></span> <span class="space"></span> : <span class="space"></span><?php echo $point; ?>
            </p>
        </div>
        <div class="btn">
            <a href="./index.php">Trở về</a>
            <span class="space"></span>
            <a href="mock_exam_ready.php">Làm lại</a>
        </div>
        <br>
    </div>
</body>

</html>
<style>
.container {
    background-color: #DCDCDC;
    color: black;
    font-size: 20px;
    text-align: left;
    padding: 20px;
    max-width: 700px;
    margin: 10% auto;
}

.container .space {
    display: inline-block;
    width: 20px;
}

.logo {
    float: right;
    max-width: 200px;
    padding: 10px;
}

.result {
    margin-top: 20px;
    margin-bottom: 20px;
}

.result p {
    text-indent: 40px;
    margin: 40px 0;
}

.btn {
    display: block;
    margin-top: 20px;
    text-align: center;
}

.btn a {
    color: #fff;
    background-color: #4CAF50;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.btn .space {
    display: inline-block;
    width: 20px;
}
</style>
<?php
	}
    else{
        echo "NO REQUEST! Vô đây làm gì! - ERROR(7769): BÌNH DƯƠNG VÔ TẬN<br>";
        echo "Quay về trang chủ ở đây nhé! ";
        echo "<a href='index.php'>Trang chủ</a>";
    }
?>