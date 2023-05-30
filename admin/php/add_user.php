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
    <title>Thêm câu hỏi</title>
</head>
<body>
    <div>
        <h1>Thêm câu hỏi thi thử tốt nghiệp</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td>Câu hỏi</td>
                <td><input name="question" type="text" required></td>
            </tr>
            <tr>
                <td>Đáp án A</td>
                <td><input name="option_a" type="text" required></td>
            </tr>
            <tr>
                <td>Đáp án B</td>
                <td><input name="option_b" type="text" required></td>
            </tr>
            <tr>
                <td>Đáp án C</td>
                <td><input name="option_c" type="text" required></td>
            </tr>
            <tr>
                <td>Đáp án D</td>
                <td><input name="option_d" type="text" required></td>
            </tr>
            <tr>
                <td>Đáp án đúng</td>
                <td>
                    <input name="answer" type="radio" value="a" checked>A
                    <input name="answer" type="radio" value="b">B
                    <input name="answer" type="radio" value="c">C
                    <input name="answer" type="radio" value="d">D
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add" value="Thêm"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST['add'])){
        $question = $_POST['question'];
        $option_a = $_POST['option_a'];
        $option_b = $_POST['option_b'];
        $option_c = $_POST['option_c'];
        $option_d = $_POST['option_d'];
        $answer = $_POST['answer'];
        $sql = "INSERT INTO tbquestion_graduation (question, option_a, option_b, option_c, option_d, answer) 
        VALUES ('".$question."', '".$option_a."', '".$option_b."', '".$option_c."', '".$option_d."', '".$answer."')";
        if (mysqli_query($con, $sql)){
            echo '<script>
                alert("Thêm thành công");
                window.opener.location.reload();
                window.close();
                </script>';
        }
        else{
            echo '<script>
                alert("Thêm thất bại");
                window.opener.location.reload();
                window.close();
                </script>';
        }
    }
?>