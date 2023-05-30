<?php
    require('../../php/connect_MySQL_n_log.php');

    // Lấy thông tin câu hỏi từ POST request
    $id = $_POST['id'];

    // Xóa câu hỏi khỏi cơ sở dữ liệu
    $sql = "DELETE FROM user_infos WHERE id = '$id'";
    if (mysqli_query($con, $sql)) {
        echo "success";
    } else {
        echo mysqli_error($con);
    }
?>