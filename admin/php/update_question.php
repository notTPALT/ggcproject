<?php 
    session_start();
    if (isset($_SESSION['admin'])){
    require('../../php/connect_MySQL_n_log.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật câu hỏi</title>
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <div>
        <h1>Cập nhật câu hỏi thi thử tốt nghiệp</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <?php
            $id = isset($_POST['id']) ? $_POST['id'] : "OK";
            $sql = "SELECT * FROM tbquestion_graduation WHERE id = '$id'";
            $tmp = mysqli_query($con, $sql);
            $res = mysqli_fetch_array($tmp);
        ?>
            <tr>
                <td style="width: 5%;">Câu hỏi.</td>
                <td style="width: 30%;"><textarea name="question" rows="4" cols="50"
                        required><?php echo $res['question']; ?></textarea></td>
            </tr>
            <tr>
                <td style="width: 5%;">Đáp án A.</td>
                <td style="width: 30%;"><textarea name="option_a" rows="2" cols="50"
                        required><?php echo $res['option_a']; ?></textarea></td>
            </tr>
            <tr>
                <td style="width: 5%;">Đáp án B.</td>
                <td style="width: 30%;"><textarea name="option_b" rows="2" cols="50"
                        required><?php echo $res['option_b']; ?></textarea></td>
            </tr>
            <tr>
                <td style="width: 5%;">Đáp án C.</td>
                <td style="width: 30%;"><textarea name="option_c" rows="2" cols="50"
                        required><?php echo $res['option_c']; ?></textarea></td>
            </tr>
            <tr>
                <td style="width: 5%;">Đáp án D.</td>
                <td style="width: 30%;"><textarea name="option_d" rows="2" cols="50"
                        required><?php echo $res['option_d']; ?></textarea></td>
            </tr>
            <td>Đáp án đúng.</td>
            <td><input name="answer_t" type="text" value="<?php echo $res['answer']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" class="center"><input type="submit" name="update" value="Cập nhật"></td>
            </tr>
        </table>
        <input type="text" name="tmp" value="<?php echo $res['id']; ?>" hidden></input>
    </form>
</body>

</html>
<?php
    if(isset($_POST['update'])){
        $question = $_POST['question'];
        $option_a = $_POST['option_a'];
        $option_b = $_POST['option_b'];
        $option_c = $_POST['option_c'];
        $option_d = $_POST['option_d'];
        $answer = $_POST['answer_t'];
        $tmp = $_POST['tmp'];

        $sql = "UPDATE tbquestion_graduation 
                SET question = '$question', option_a = '$option_a', option_b = '$option_b', 
                option_c = '$option_c', option_d = '$option_d', answer = '$answer' 
                WHERE id = '$tmp'";
        if (mysqli_query($con, $sql)){
            echo '<script>
                alert("Cập nhật câu hỏi thành công");
                window.opener.location.reload();
                window.close();
                </script>';
        }
        else{
            echo '<script>
                alert("Cập nhật câu hỏi thất bại");
                window.opener.location.reload();
                window.close();
                </script>';
        }
    }
    } 
    else{
        header("HTTP/1.0 404 Not Found");
        header("Location: error_404.html");
        exit();
    }
?>