<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct</title>
</head>

<body>
    <div>
        <strong>
            <p style="line-height: 20vh; color: red; font-size: 40px; text-align: center;" id="bb"></p>
        </strong>
    </div>
</body>

</html>
<script>
const a = document.getElementById('bb');
var time = 5;
var myInterval = setInterval(function() {
    a.innerHTML = `Đăng ký thành công! Chuyển tới trang đăng nhập sau ${time}s`;
    time--;
    if (time == 0) {
        clearInterval(myInterval);
        window.location.href = "../login.php";
    }
}, 1000)
</script>