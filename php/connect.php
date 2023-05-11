<?php
    session_start();
    $adr = "localhost";
    $taikhoan = "root";
    $matkhau = "";
    $database = "webthi";
    $con = mysqli_connect($adr, $taikhoan, $matkhau, $database) or die("Connect database fail!");
?>