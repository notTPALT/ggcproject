<?php
session_start();
require_once("./html/header.php");
require_once("./php/connect_MySQL_n_log.php");
?>
<style>
.tableStyle {

    border: none;
    width: 90%;
}

.tableStyle th {
    background-color: #cad8fa;
    padding: 5px;
}

.tableStyle td {
    background-color: #f0e7da;
    padding: 5px;
}

#text {
    text-align: center;
}
</style>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table class="tableStyle">
        <tr>
            <td id="text"><strong>Lần thi</strong></td>
            <td id="text"><strong>Số câu đúng</strong></td>
            <td id="text"><strong>Số câu sai</strong></td>
            <td id="text"><strong>Số câu để trống</strong></td>
            <td id="text"><strong>Điểm</strong></td>
        </tr>

        <?php
        $sql = "SELECT * FROM mock_exam_history WHERE username = '".$_SESSION['username']."'";
        
        $result = mysqli_query($con, $sql);
        $i = 1;
        while($res = mysqli_fetch_array($result)){ $k = $i;?>
        <tr>
            <td id="text"><?php echo $k; ?></td>
            <td id="text"><?php echo $res['correct']; ?></td>
            <td id="text"><?php echo $res['incorrect']; ?></td>
            <td id="text"><?php echo $res['unanswered']; ?></td>
            <td id="text"><?php echo $res['point_total']; ?></td>
        </tr>
        <?php
        $i++;}
        ?>
        <tr>
            <td id="text" colspan="5">
                <input style="background-color: #4CAF50;
                            color: white;
                            height :30px;
                            border: none;
                            padding: 10px 20px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 20px;
                            border-radius: 5px;
                            cursor: pointer;
                        line-height: 15px;" type="submit" name="save" value="Lưu kết quả">
            </td>
        </tr>
    </table>
</form>
<?php 
echo file_get_contents("./html/footer.html");
?>