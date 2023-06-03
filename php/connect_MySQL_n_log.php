<?php
    /**
     * File này chứa các function để lưu lịch sử hoạt động và câu lệnh thực hiện kết nối đến CSDL với $con là biến lưu trữ dữ liệu kêt
     * nối mặc định. $con sẽ là biến mặc định để thực hiện truy vấn.
     * 
     * Phải import file này trước khi thực hiện bất kì thao tác nào liên quan đến SQL.
     */
    $con = mysqli_connect("localhost", "root", "", "ggcproject");

    /**
     * Thực hiện truy vấn lưu $logstring vào lịch sử hoạt động
     * @param mixed $con Biến thực hiện truy vấn
     * @param string $logstring String cần lưu
     */
    function project_log($con, $logstring) {
        // 
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('".$_SESSION['username']."', '".$logstring."')");
    }

    /**
     * Thực hiện truy vấn lưu $logstring vào lịch sử hoạt động (không xác định người thực hiện)
     * @param mixed $con Biến thực hiện truy vấn
     * @param string $logstring String cần lưu
     */
    function project_log_no_username($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('unidentified', '".$logstring."')");
    }

    /**
     * Thực hiện truy vấn lưu $logstring vào lịch sử hoạt động (Dùng cho admin)
     * @param mixed $con Biến thực hiện truy vấn
     * @param string $logstring String cần lưu
     */
    function project_log_admin($con, $logstring) {
        mysqli_query($con, "INSERT INTO server_log (username, events) VALUES ('".$_SESSION['admin']."', '".$logstring."')");
    }
?>