<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <title>Home - GGC</title>
    <link rel="icon" href="./resources/favicon.png">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="container">
        <div class="header">
            <div id="header-top">
                <div id="logo-header">
                    <a href="index.php"><img src="./resources/favicon.png" alt="Logo"></a>
                </div>

                <!--Tiêu đề trang-->
                <div id="banner">
                    <div id="para">Ôn thi trắc nghiệm Vật Lí online</div>
                </div>

                <!--Các thao tác liên quan đến người dùng-->
                <ul id="nav-infor">
                    <li>
                        <a id="link-to-reg" href="./register.php"><button id="btn-show-username-or-register"
                                style="background-color: #B0F1FF; border: 0px;"><label
                                    style="align: center;"><?php echo "Đăng ký"; ?></label></button></a>
                        <ul class="subnav-infor">
                            <?php
                                if (isset($_SESSION['username'])){ ?>

                            <!-- Phu: script thay đổi chức năng các button -->
                            <script>
                            document.getElementById("link-to-reg").removeAttribute("href");
                            document.getElementById("btn-show-username-or-register").innerHTML =
                                "<?php echo $_SESSION['username'];?>";
                            </script>
                            <li><a href="./user_infos.php">Thông tin cá nhân</a></li>
                            <li><a href="./change_password.php">Đổi mật khẩu</a></li>
                            <li><a href="./mock_exam_history.php">Lịch sủ thi thử</a></li>
                            <?php   } ?>
                        </ul>
                    </li>
                </ul>
                <?php
                    if (isset($_SESSION['username'])){ ?>
                <a href="./log_out.php"><button id="button-dangxuat" name="xuli">Đăng xuất</button></a>
                <?php   }
                    else{ ?>
                <a href="./login.php"><button id="button-dangxuat" name="xuli">Đăng nhập</button></a>
                <?php   } ?>
            </div>

            <!--Thanh điều hướng trang-->
            <div id="header-bottom">
                <ul id="nav-header">
                    <li><a href="./index.php">Trang chủ</a></li>
                    <li>
                        <a href="">Lớp 10 ▼</a>
                        <ul class="subnavclass10">
                            <li><a id="_10_1" href="./test.php?level=10&chapter=1">Chương 1: Mở đầu</a></li>
                            <li><a id="_10_2" href="./test.php?level=10&chapter=2">Chương 2: Động học</a></li>
                            <li><a id="_10_3" href="./test.php?level=10&chapter=3">Chương 3: Động lực học</a></li>
                            <li><a id="_10_4" href="./test.php?level=10&chapter=4">Chương 4: Năng lượng, công, công
                                    suất</a></li>
                            <li><a id="_10_5" href="./test.php?level=10&chapter=5">Chương 5: Động lượng</a></li>
                            <li><a id="_10_6" href="./test.php?level=10&chapter=6">Chương 6: Chuyển động tròn</a></li>
                            <li><a id="_10_7" href="./test.php?level=10&chapter=7">Chương 7: Biến dạng của vật rắn. Áp
                                    suất chất
                                    lỏng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 11 ▼</a>
                        <ul class="subnavclass11">
                            <li><a id="_11_1" href="./test.php?level=11&chapter=1">Chương 1: Điện tích. Điện trường</a>
                            </li>
                            <li><a id="_11_2" href="./test.php?level=11&chapter=2">Chương 2: Dòng điện không Đổi</a>
                            </li>
                            <li><a id="_11_3" href="./test.php?level=11&chapter=3">Chương 3: Dòng điện Trong Các Môi
                                    Trường</a></li>
                            <li><a id="_11_4" href="./test.php?level=11&chapter=4">Chương 4: Từ trường</a></li>
                            <li><a id="_11_5" href="./test.php?level=11&chapter=5">Chương 5: Cảm ứng điện từ</a></li>
                            <li><a id="_11_6" href="./test.php?level=11&chapter=6">Chương 6: Khúc Xạ Ánh Sáng</a></li>
                            <li><a id="_11_7" href="./test.php?level=11&chapter=7">Chương 7: Mắt. Các Dụng Cụ Quang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Lớp 12 ▼</a>
                        <ul class="subnavclass12">
                            <li><a id="_12_1" href="./test.php?level=12&chapter=1">Chương 1: Dao Động Cơ</a></li>
                            <li><a id="_12_2" href="./test.php?level=12&chapter=2">Chương 2: Sóng Cơ và Sóng Âm</a></li>
                            <li><a id="_12_3" href="./test.php?level=12&chapter=3">Chương 3: Dòng điện xoay chiều</a>
                            </li>
                            <li><a id="_12_4" href="./test.php?level=12&chapter=4">Chương 4: Dao Động và Sóng Điện
                                    Tử</a></li>
                            <li><a id="_12_5" href="./test.php?level=12&chapter=5">Chương 5: Sóng Ánh Sáng</a></li>
                            <li><a id="_12_6" href="./test.php?level=12&chapter=6">Chương 6: Lượng Tử Ánh Sáng</a></li>
                            <li><a id="_12_7" href="./test.php?level=12&chapter=7">Chương 7: Hạt Nhân Nguyên Tử</a></li>
                            <li><a id="_12_8" href="./test.php?level=12&chapter=8">Chương 8: Từ Vĩ Mô Đến Vĩ Mô</a></li>
                        </ul>
                    </li>
                    <li><a href="./mock_exam_ready.php">Ôn thi tốt nghiệp</a></li>
                    <li><a href="./contact.php">Liên hệ</a></li>
                    <li><a href="./papers.php">Tài liệu</a></li>
                </ul>

            </div>
        </div>

        <!--Nội dung của trang-->
        <div class="container-content">
            <!-- <div class="breadcrumb">
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
=======
<div class="header">
    <div id="header-top">
        <!-- Logo của trang -->
        <div id="logo-header">
            <a href="index.php"><img src="./resources/favicon.png" alt="Logo"></a>
        </div>

        <!--Thanh tiêu đề trang-->
        <div id="banner">
            <div id="para">Ôn tập và thi thử trắc nghiệm Vật Lí online</div>
        </div>

        <!-- Các thao tác liên quan đến thông tin đăng nhập -->
        <ul id="nav-infor">
            <li>
                <!-- Nút đăng ký hoặc hiển thị tên tài khoản -->
                <!-- button này sẽ vô hiệu hóa và đổi innerHTML thành tên tài khoản nếu đã đăng nhập -->
                <a id="link-to-reg" href="./register.php">
                    <button id="btn-show-username-or-register" style="background-color: rgba(0,0,0,0); border: 0px;">
                        <label style="align: center; cursor: pointer;">Đăng ký</label>
                    </button>
                </a>


                <ul class="subnav-infor">
                    <?php
                        // Thay thế nút đăng ký theo tình trạng đăng nhập
                        if (isset($_SESSION['username'])){ ?>
                    <script>
                    document.getElementById("link-to-reg").removeAttribute("href");
                    document.getElementById("btn-show-username-or-register").innerHTML =
                        "<?php echo $_SESSION['username'];?>";
                    </script>
                    <li><a href="./user_infos.php">Thông tin cá nhân</a></li>
                    <li><a href="./change_password.php">Đổi mật khẩu</a></li>
                    <li><a href="./mock_exam_history.php">Lịch sủ thi thử</a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
        <?php
            // Nút đăng nhập (Thay thế thành đăng ký nếu đã đăng nhập)
            if (isset($_SESSION['username'])){ ?>
        <a href="./log_out.php"><button id="button-dangxuat" name="xuli">Đăng xuất</button></a>
        <?php   }
            else{ ?>
        <a href="./login.php"><button id="button-dangxuat" name="xuli">Đăng nhập</button></a>
        <?php   } ?>
    </div>
>>>>>>> Stashed changes

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

            </div> -->
            <div class="box-content">