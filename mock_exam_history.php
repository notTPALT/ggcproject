<?php
    session_start();
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    if (isset($_SESSION['username'])){
        ob_start();
        require_once("./html/header.php");
        require_once("./php/connect_MySQL_n_log.php");


        // Tải thư viện PHPSpreadsheet
        require_once 'vendor/autoload.php';

        if(isset($_POST['save'])) {
            // Lấy dữ liệu từ database
            $sql = "SELECT * FROM mock_exam_history WHERE username = '".$_SESSION['username']."'";
            $result = mysqli_query($con, $sql);

            // Khởi tạo đối tượng Spreadsheet
            $spreadsheet = new Spreadsheet();

            // Thêm Worksheet mới vào Spreadsheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Thiết lập tiêu đề cho các cột trong bảng
            $worksheet->setCellValue('A1', 'Lần thi');
            // $worksheet->setCellValueByColumnAndRow(1, 1, 'Lần thi');
            $worksheet->setCellValue('B1', 'Số câu đúng');
            $worksheet->setCellValue('C1', 'Số câu sai');
            $worksheet->setCellValue('D1', 'Số câu để trống');
            $worksheet->setCellValue('E1', 'Điểm');

            // Đọc dữ liệu từ bảng HTML và ghi vào Worksheet
            $rowCount = 2;
            while($res = mysqli_fetch_array($result)) {
                $worksheet->setCellValue('A'.$rowCount, $rowCount - 1);
                $worksheet->setCellValue('B'.$rowCount, $res['correct']);
                $worksheet->setCellValue('C'.$rowCount, $res['incorrect']);
                $worksheet->setCellValue('D'.$rowCount, $res['unanswered']);
                $worksheet->setCellValue('E'.$rowCount, $res['point_total']);
                $rowCount++;
            }

            // Thiết lập header để cho trình duyệt biết đây là một tệp tin Excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="exam_results.xlsx"');

            // Sử dụng đối tượng Xlsx để xuất tệp Excel từ Spreadsheet
            $writer = new Xlsx($spreadsheet);
            ob_end_clean();
            $writer->save('php://output');
            exit();
        }
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
    }
    else{
        echo "Đăng nhập để có thể truy cập!";
    }
?>