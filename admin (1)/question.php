<?php
    session_start();
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
    <title>Question - GGC</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php require_once("./php/form/header.php"); ?>
    <div class="container">
        <div class="sidebar">
            <nav>
                <!-- Danh mục nội dung -->
                <ul>
                    <li><a href="#" class="active"><b>Danh mục</b></a></li>
                    <li><a href="user.php">亗 Tài khoản</a></li>
                    <li><a style="background-color: yellow;" href="question.php">亗 Câu hỏi thi thử ◉</a></li>
                    <li><a href="point.php">亗 Điểm</a></li>
                </ul>
            </nav>
        </div>

        <div class="box-content" style = "width : 80%;">
            <table class="tableStyle">
                <tr><button id="btnAddQuestion" >Thêm câu hỏi</button></tr>
                <tr><td id="text">STT</td><td id="text">Question</td><td id="text" colspan="3">Chức năng</td></tr>
                <?php 
                    $sql = "SELECT * from tbquestion_graduation";
                    $tmp = mysqli_query($con, $sql);
                    $i = 1;
                    while($res = mysqli_fetch_array($tmp)){ ?>
                            <tr id="<?php echo $res['id'];?>">
                                <td id="text"><?php echo $i++; ?></td>
                                <td style="max-width: 600px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?php echo $res['question'] ?></td>
                                <td><input type="button" value="Xem" style="background-color: green;" onclick="showQuestion(<?php echo $res['id'] ?>)"></td>
                                <td><input type="button" value="Sửa" style="background-color: #FFD700;" onclick="updateQuestion(<?php echo $res['id'] ?>)"></td>
                                <td><input type="button" value="Xóa" style="background-color: red;" onclick="deleteQuestion(<?php echo $res['id'] ?>)"></td>
                            </tr>
                            <?php
                    }
                    ?>
            </table>
        </div>
    </div>

    <?php require_once("../html/footer.html"); ?>
</body>
</html>
<script type="text/javascript">
    var left = (screen.width/2)-(800/2);
    var top = (screen.height/2)-(600/2);

    $(document).ready(function() {
        $('#btnAddQuestion').click(function(){
            window.open('php/add_question.php', 'Thêm câu hỏi', 'height=600,width=800,left='+left+',top='+top);
        });
    });
    
    function showQuestion(questionId){
        $.ajax({
                url: 'php/show_question.php',
                type: 'POST',
                data: {id: questionId},
                success: function(response) {
                    window.open('php/show_question.php', 'Xem câu hỏi', 'height=600,width=800,left='+left+',top='+top).document.write(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Lỗi khi hiển thị câu hỏi: " + errorThrown);
                }
            });
    }

    function updateQuestion(questionId){
        $.ajax({
                url: 'php/update_question.php',
                type: 'POST',
                data: {id: questionId},
                success: function(response) {
                    window.open('php/update_question.php', 'Cập nhật câu hỏi', 'height=600,width=800,left='+left+',top='+top).document.write(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Lỗi khi update câu hỏi: " + errorThrown);
                }
            });
    }

    function deleteQuestion(questionId) {
        if (confirm("Bạn có chắc muốn xóa câu hỏi này?")) {
            $.ajax({
                url: 'php/delete_question.php',
                type: 'POST',
                data: {id: questionId},
                success: function(response) {
                    // Xóa câu hỏi trên trang web
                    $('tr[id="' + questionId + '"]').remove();
                    location.reload();
                    alert("Xóa câu hỏi thành công");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert("Lỗi khi xóa câu hỏi: " + errorThrown);
                }
            });
        }
    }
</script>