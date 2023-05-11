<?php 
    require('php/connect_MySQL_n_log.php');    
    require_once '../PHPExcel/Classes/PHPExcel.php';
               
    $usernameTMP = "username";
    if (isset($_SESSION['user'])){
        $usk = $_SESSION['user'];
    }   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <title>Home - GGC</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div id="container">
        <div class="header">
            <div id="header-top">
                <div id="logo-header">
                    <a href="index.php"><img src="source/logo.png" alt="Logo"></a>
                </div>
                <div id="banner">
                    <div id="para">Ôn thi trắc nghiệm Vật Lí online</div>
                </div>
                <ul id="nav-infor">
                    <li>
                        <a href=""><button id="button-hello" style="background-color: #B0F1FF; border: 0px;"><label
                                    style="align: center;"><?php echo "".$usernameTMP.""; ?></label></button></a>
                        <ul class="subnav-infor">
                            <?php
                                if (isset($_SESSION['user'])){ ?>
                            <li><a href="personal_information.php">Thông tin cá nhân</a></li>
                            <li><a href="change_password.php">Đổi mật khẩu</a></li>
                            <?php   } ?>
                        </ul>
                    </li>
                </ul>
                <?php
                    if (isset($_SESSION['user'])){ ?>
                <a href="index.php?act=process_logout"><button id="button-dangxuat" name="xuli">Log out</button></a>
                <?php   }
                    else{ ?>
                <a href="sign_in.php"><button id="button-dangxuat" name="xuli">Sign in</button></a>
                <?php   } ?>
            </div>

            <div id="header-bottom">
                <ul id="nav-header">
                    <li><a href="">Trang chủ</a></li>
                    <li>
                        <a href="">Lớp 10 ▼</a>
                        <ul class="subnavclass10">
                            <li><a href="#">Chương 1: Mở đầu</a></li>
                            <li><a href="#">Chương 2: Động học</a></li>
                            <li><a href="#">Chương 3: Động lực học</a></li>
                            <li><a href="#">Chương 4: Năng lượng, công, công suất</a></li>
                            <li><a href="#">Chương 5: Động lượng</a></li>
                            <li><a href="#">Chương 6: Chuyển động tròn</a></li>
                            <li><a href="#">Chương 7: Biến dạng của vật rắn. Áp suất chất lỏng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 11 ▼</a>
                        <ul class="subnavclass11">
                            <li><a href="#">Chương 1: Điện Tích. Điện trường</a></li>
                            <li><a href="#">Chương 2: Dòng điện không Đổi</a></li>
                            <li><a href="#">Chương 3: Dòng điện Trong Các Mội Trường</a></li>
                            <li><a href="#">Chương 4: Từ trường</a></li>
                            <li><a href="#">Chương 5: Cảm ứng điện từ</a></li>
                            <li><a href="#">Chương 6: Khúc Xạ Ánh Sáng</a></li>
                            <li><a href="#">Chương 7: Mắt. Các Dụng Cụ Quang</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 12 ▼</a>
                        <ul class="subnavclass12">
                            <li><a href="#">Chương 1: Dao Động Cơ</a></li>
                            <li><a href="#">Chương 2: Sóng Cơ và Sóng Âm</a></li>
                            <li><a href="#">Chương 3: Dòng điện xoay chiều</a></li>
                            <li><a href="#">Chương 4: Dao Động và Sóng Điện Tử</a></li>
                            <li><a href="#">Chương 5: Sóng Ánh Sáng</a></li>
                            <li><a href="#">Chương 6: Lượng Tử Ánh Sáng</a></li>
                            <li><a href="#">Chương 7: Hạt Nhân Nguyên Tử</a></li>
                            <li><a href="#">Chương 8: Từ Vĩ Mô Đến Vĩ Mô</a></li>
                        </ul>
                    </li>
                    <li><a href="">Ôn thi tốt nghiệp</a></li>
                    <li><a href="">Liên hệ</a></li>
                    <li><a href="">Tài liệu</a></li>
                </ul>

            </div>
        </div>
        <div class="container-content">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="#">Trang chủ</a>
                    </li>

                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>

                    <li>
                        <a href="#">Lớp Z</a>
                    </li>

                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>

                    <li>
                        <a href="#">Chương Y</a>
                    </li>
                </ul>

            </div>
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
            <div class="box-content">
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
                        $sql = "SELECT * FROM mock_exam_history WHERE username LIKE '".$_SESSION['username']."'";
                        
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
            </div>
        </div>

        <footer class="footer-container">
            <div class="footer-left">
                <h3>Goblins<span> Go </span>Code</h3>
                <p class="footer-links">
                    <a href="#">Home</a>
                    |
                    <a href="#">About</a>
                    |
                    <a href="#">Contact</a>
                    |
                    <a href="#">Blog</a>
                </p>
                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-center">
                <p class="footer-about">
                    <span>About Team</span>
                    <strong>Trần Đình Chiến</strong>
                    <br><strong>Bùi Thanh Phú</strong>
                    <br><strong>Phạm Duy Hưng</strong>
                    <br><strong>Nguyễn Đặng Toàn Thắng</strong>
                </p>
            </div>
            <div class="footer-right">
                <div class="footer-right">
                    <i class="fa fa-map-marker"></i>
                    <p><span>QUY NHON</span>
                        Binh Dinh</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>034701946*</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="goblinsgocode@gmail.com">goblinsgocode@gmail.com</a></p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
<?php
    if (isset($_POST['save'])) {
        
    }
?>