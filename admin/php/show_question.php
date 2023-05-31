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
    <title>Xem câu hỏi</title>
    <link rel="stylesheet" href="./css/form.css">
</head>
<?php
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;
    $sql = "SELECT * FROM tbquestion_graduation WHERE id = '$id'";
    $tmp = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($tmp);
?>

<body>

    <div>
        <h1>Xem câu hỏi</h1>
    </div>
    <form>
        <table>
            <tr>
                <td style="width: 5%;">Câu hỏi</td>
                <td style="width: 30%;"><label><?php echo $res['question']; ?></label></td>
            </tr>
            <tr>
                <td>Đáp án A</td>
                <td><label><?php echo $res['option_a']; ?></label></td>
            </tr>
            <tr>
                <td>Đáp án B</td>
                <td><label><?php echo $res['option_b']; ?></label></td>
            </tr>
            <tr>
                <td>Đáp án C</td>
                <td><label><?php echo $res['option_c']; ?></label></td>
            </tr>
            <tr>
                <td>Đáp án D</td>
                <td><label><?php echo $res['option_d']; ?></label></td>
            </tr>
            <tr>
                <td>Đáp án đúng</td>
                <td><label><?php echo $res['answer']; ?></label></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php 
    } 
    else{
        header("HTTP/1.0 404 Not Found");
        header("Location: error_404.html");
        exit();
    }
?>