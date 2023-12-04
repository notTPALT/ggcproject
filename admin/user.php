<?php
    session_start();
    require('../php/connect_MySQL_n_log.php');
    $username = isset($_POST['ad']) ? $_POST['ad'] : "_____";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/js_user.js"></script>
</head>
<body>
    <?php require_once("form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <!-- Danh mục nội dung -->
                <ul>
                    <li><a href="" class="active"><b>Danh mục</b></a></li>
                    <li><a href="user.php" style="background-color: yellow;">亗 Tài khoản ◉</a></li>
                    <li><a href="question.php">亗 Câu hỏi thi thử</a></li>
                    <li><a href="point.php">亗 Điểm</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style = "width : 80%">
            <button id="btnAddUser" style="height: 30px;">Thêm tài khoản</button>

            <table class="tableStyle">
                <tr><td id="text">STT</td><td id="text">Tài khoản</td><td id="text" colspan="3">Chức năng</td></tr>
                <?php 
                    $sql = "SELECT * from user_infos";
                    $tmp = mysqli_query($con, $sql);
                    $i = 1;
                    while($res = mysqli_fetch_array($tmp)){ ?>
                            <tr id="<?php echo $res['id'];?>">
                                <td id="text"><?php echo $i++; ?></td>
                                <td ><?php echo $res['username']; ?></td>
                                <td><input type="button" value="Xem" onclick="showUser(<?php echo $res['id']; ?>)"></td>
                                <td><input type="button" value="Sửa" onclick="updateUser(<?php echo $res['id']; ?>)"></td>
                                <td><input type="button" value="Xóa" onclick="deleteUser(<?php echo $res['id']; ?>)"></td>
                            </tr>
                            <?php
                    }
                    ?>
            </table>
        </div>
    </div>

    <?php require_once("../../html/footer.html"); ?>
</body>
</html>
