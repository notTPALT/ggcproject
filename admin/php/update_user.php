<?php 
  require('../../php/connect_MySQL_n_log.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../resources/favicon.png">
    <title>Cập nhật câu hỏi</title>
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
                <td>Câu hỏi.</td>
                <td><input name="question" type="text" value="<?php echo $res['question']; ?>"></td>
            </tr>
            <tr>
                <td>Đáp án A.</td>
                <td><input name="option_a" type="text" value="<?php echo $res['option_a']; ?>"></td>
            </tr>
            <tr>
                <td>Đáp án B.</td>
                <td><input name="option_b" type="text" value="<?php echo $res['option_b']; ?>"></td>
            </tr>
            <tr>
                <td>Đáp án C.</td>
                <td><input name="option_c" type="text" value="<?php echo $res['option_c']; ?>"></td>
            </tr>
            <tr>
                <td>Đáp án D.</td>
                <td><input name="option_d" type="text" value="<?php echo $res['option_d']; ?>"></td>
            </tr>
            <tr>
                <td>Đáp án đúng.</td>
                <td><input name="answer_t" type="text" value="<?php echo $res['answer']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="Cập nhật"></td>
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
                alert("Cập nhật thành công");
                window.opener.location.reload();
                window.close();
                </script>';
        }
        else{
            echo '<script>
                alert("Cập nhật thất bại");
                window.opener.location.reload();
                window.close();
                </script>';
        }
    }
?>