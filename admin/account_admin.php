<?php
    session_start();
    if (isset($_SESSION['admin'])){
    require('../php/connect_MySQL_n_log.php');
    $username = isset($_POST['ad']) ? $_POST['ad'] : "admin";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Tài khoản admin</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/js_admin.js"></script>
</head>

<body>
    <?php require_once("form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <!-- Danh mục nội dung -->
                <ul>
                    <li><a href="" class="active"><b>Danh mục</b></a></li>
                    <li><a href="account_user.php">亗 Tài khoản</a></li>
                    <li><a href="question.php">亗 Câu hỏi thi thử</a></li>
                    <li><a href="account_admin.php" style="background-color: yellow;">亗 Tài khoản admin ◉</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style="width : 80%">
            <table class="tableStyle">
                <tr>
                    <td id="text">STT</td>
                    <td id="text">Tài khoản</td>
                    <td id="text">Họ</td>
                    <td id="text">Tên</td>
                    <td id="text">Số điện thoại</td>
                    <td id="text" colspan="3">Chức năng</td>
                    <td><button id="btnAddAdmin" style="height: 30px; background-color: #4CAF50; padding: 5px 10px; color: white;
                                border: none; height: 30px; border-radius: 5px; cursor: pointer;">Thêm tài khoản
                            admin</button></td>
                </tr>
                <?php 
                    $sql = "SELECT * from tb_admin";
                    $tmp = mysqli_query($con, $sql);
                    $i = 1;
                    while($res = mysqli_fetch_array($tmp)){ ?>
                <tr id="<?php echo $res['id'];?>">
                    <td id="text"><?php echo $i++; ?></td>
                    <td><?php echo $res['username']; ?></td>
                    <td><?php echo $res['fname']; ?></td>
                    <td><?php echo $res['lname']; ?></td>
                    <td><?php echo $res['phone']; ?></td>
                    <td><input type="button" value="Xem" onclick="showAdmin(<?php echo $res['id']; ?>)"></td>
                    <td><input type="button" value="Sửa" style="background-color: #FFD700;"
                            onclick="updateAdmin(<?php echo $res['id']; ?>)"></td>
                    <td><input type="button" value="Xóa" style="background-color: red;"
                            onclick="deleteAdmin(<?php echo $res['id']; ?>)"></td>
                </tr>
                <?php
                    }
                    ?>
            </table>
        </div>
    </div>

    <?php echo file_get_contents("../html/footer.html"); ?>
</body>

</html>
<?php 
    } 
    else{
        header('Location: login_admin.php');
        exit;
    }
?>