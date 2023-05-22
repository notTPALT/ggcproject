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
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

#container{
    background-image: linear-gradient(to top, #accbee 0%, #e7f0fd 100%);
}

/*CSS cho đầu trang*/
.header{
    background-color: whitesmoke;
    position: relative;
    height: 158px;
    width: 100%;
    align-items: center;
}

/*CSS cho đầu trang ở phần trên*/
.header #header-top{
    position: relative;
    width: 1349px;
    height: 150px;
    left: 0;
    right: 0;
    margin: 0 auto;
}

/*CSS cho phần chứa logo của dầu trang*/
#header-top #logo-header{
    position: absolute;
    top: 11px;
    left: 200px;
    right: 0px;
    margin: 0px auto;
}

/*CSS cho logo đầu trang*/
#header-top img{
    width: 77px;
    height: 77px;
}


/*CSS cho phần tử bao bọc Ôn thi trắc nghiệm Vật Lý online*/
#header-top #banner{
    position: absolute;
    width: 759px;
    height: 79px;
    background-color: #024422;
    top: 11px;
    left: 30px;
    right: 0px;
    margin: 0px auto;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 20px;
}

/*CSS cho chữ Ôn thi trắc nghiệm Vật Lý online*/
#header-top #banner #para{
    position: absolute;
    width: 440px;
    height: 57px;
    left: 215px;
    top: 10px;
    /*CSS cho phần chữ Ôn thi thi trắc nghiệm trắc nghiệm Vật Lý*/
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 57px;
    display: flex;
    align-items: center;
    text-align: center; 
    color: rgb(245, 245, 245);
    
}

/*CSS cho phần chung của hai nút button hello và button đăng xuất */
#header-top #nav-infor, #button-dangxuat{
    position: absolute;
    height: 22px;
    top: 68px;
}

/*CSS cho phần riêng của button infor*/
#header-top #nav-infor{
    width: 145px;
    line-height: 22px;
    left: 960px;
    right: 0;
    margin: 0px auto;
    z-index: 3;
}


#header-top #nav-infor, 
.subnav-infor{
    background-color: #11ab7d;
    list-style-type: none;
}

/*CSS các phần tử của button infor*/
#header-top #nav-infor li{
    position: relative;
}

#header-top #nav-infor li a{
    text-decoration: none;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    color: whitesmoke;
} 

#header-top #nav-infor > li > a{
    display: inline-block;
    width: 145px;
    line-height: 22px;
    text-align: center;
}
 
#header-top #nav-infor > li:hover > a,
#nav-infor .subnav-infor li:hover{
    background-color: rgba(21, 206, 191, 0.329);
}
  
#header-top #nav-infor li:hover .subnav-infor{
   display: block;
}
  
#header-top #nav-infor li .subnav-infor{
   display: none;
   position: absolute;
   width: 100%;
}

#header-top #nav-infor li .subnav-infor li a{
    margin-left: 14px;
}

/*CSS cho phần riêng button dang xuat */
#header-top #button-dangxuat{
    width: 85px;
    left: 1210px;
    right: 0px;
    margin: 0px auto;
    background: grey;
    font-weight: bold;
    border: 0px;
    cursor: pointer;
}


/*CSS cho đầu trang ở phần dưới*/
.header #header-bottom{
    position: relative;
    width: 100%;
    min-width: 1349px;
    height: 50px;
    top: -32px;
    background-color: #024422;
    z-index: 2;
    left: 0;
    right: 0;
    margin: 0 auto;
}

/*CSS cho phần điều hướng */
#header-bottom #nav-header{
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 1349px;
    text-align: center;
}

/*CSS cho các phần tử con của phần điều hướng */
#header-bottom #nav-header li{
    display: inline-block;
}

/*CSS thẻ a cho phẳn tử con cuối cùng trong của phần điều hướng */ 
#header-bottom #nav-header li:last-child a{
    border-right: none;
}

/*CSS cho thẻ a của các phần tử con trong phần điều hướng */
#header-bottom #nav-header li a{
    display: inline-block;
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    font-weight: 550;
    font-size: 18px;
    text-decoration: none;
    line-height: 50px;
    align-items: center;
    text-align: center;
    color: #fff;
    padding: 0px 18px;
    border-right: 1px solid #333;
    margin-left: -4px;
}

/*CSS hover trực tiếp cho thẻ a là con trực tiếp của nav*/
/*CSS cho con của phần tử lớp 10, lớp 11, lớp 12*/
#header-bottom #nav-header > li:hover > a,
#nav-header .subnavclass10 li:hover,
#nav-header .subnavclass11 li:hover,
#nav-header .subnavclass12 li:hover{
    background-color: rgba(20, 175, 129, 0.253);
    color: rgba(245, 245, 245, 0.74);
    opacity: 0.8;
}

/*css cho phan tu con thứ 2, thứ 3, thứ 4 của nav*/
#header-bottom #nav-header li:nth-child(2), 
#nav-header li:nth-child(3), 
#nav-header li:nth-child(4){
    position: relative;
}


#header-bottom #nav-header li:nth-child(2):hover .subnavclass10, 
#header-bottom #nav-header li:nth-child(3):hover .subnavclass11,
#header-bottom #nav-header li:nth-child(4):hover .subnavclass12 {
    display: block;
}

/*CSS cho phần tử con của nav có chữ lớp 10, lớp 11 và lớp 12*/
#header-bottom #nav-header li .subnavclass10, 
#header-bottom #nav-header li .subnavclass11,
#header-bottom #nav-header li .subnavclass12{
    display: none;
    position: absolute;
    background-color: #05331b;
    margin-left: -5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
}

/*CSS phần chung cho thẻ a là con của lớp 10, lớp 11 và lớp 12*/
#header-bottom #nav-header .subnavclass10 li a,
#header-bottom #nav-header .subnavclass11 li a,
#header-bottom #nav-header .subnavclass12 li a{
    color: rgba(245, 245, 220, 0.747);
    font-weight: bold;
    margin-left: -5px;
    border-right: none;
    font-size: 12.9px;
    height: 40px;
    line-height: 40px;
    text-align: left;
}

/*CSS phần riêng cho thẻ a là con của lớp 10*/
#header-bottom #nav-header .subnavclass10 li a{
    width: 357.185px;
}

/*CSS phần riêng cho thẻ a là con của lớp 11*/
#header-bottom #nav-header .subnavclass11 li a{
    width: 328.185px;
}

/*CSS phần riêng cho thẻ a là con của lớp 12*/
#header-bottom #nav-header .subnavclass12 li a{
    width: 307.6px;
}


/*CSS cho container-content*/
#container .container-content{
    position: relative;
    width: 100%;
    height: 100%;
    min-width: 1349px;
    min-height: 1000px;
    z-index: 1;
}


/*CSS cho breadcrums */
.container-content .breadcrumb{
    position: absolute;
    left: 17.71%;
    top: 3.23%;
    height: 24.14px;
    width: 317px;
}

/*CSS cho >> trong breadcrumbs*/
.container-content .breadcrumb svg{
    height: 18px;
    vertical-align: middle;
}

/*CSS cho phần tử cha của breadcrum */
.container-content .breadcrumb ul{
    display: flex;
    list-style: none;
    align-items: center;
    gap: 3px;
}

/*CSS cho thẻ a */
.breadcrumb ul li a{ 
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 24px;
    color: #000000;
    text-decoration: none;
}


/*CSS cho phần chứa nội dung trong container-content*/
.container-content .box-content{
    position: absolute;
    width: 53.8%;
    height: 87.58%;
    top: 10%;
    transform: translateX(45%);
    background-color: #fff;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 20px;
}

/*CSS cho phần chứa nội dung lý thuyết*/
.box-content{
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    padding-left: 40px;
    padding-top: 40px;
    padding-bottom: 20px;
    overflow-y: scroll;
    
}

/*CSS cho phần tiêu đề của phần chứa nội dung lý thuyết */
.header-page{
    font-size: 18px;
}

/*CSS cho các mục lớn của phần chứa nội dung lý thuyết*/
.category-page{
    font-size: 13.5px;
}

/*CSS cho các mục nhỏ của phần chứa nội dung lý thuyết */
.column-page{
    font-size: 12px;
    color: #0000FF;
}

/*CSS cho văn bản của phần chứa nội dung lý thuyết */
.paragraph{
    font-size: 12px;
}

/*CSS cho phần chân trang*/
footer {
    position: -ms-page;
    bottom:0;
}


@media (max-height:800px) {
    footer {
        position: static;
    }
    header {
        padding-top: 40px;
    }
}

/*CSS cho phần chứa footer-left, footer-center, footer-right*/
.footer-container {
    background-color: #2d2a30;
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    min-width: 1349px;
    font: bold 16px sans-serif;
    padding: 30px 30px 5px 70px;
    margin-top: 10px;
}

/*CSS cho footer bên trái, footer chính giữa và footer bên phải */
.footer-container .footer-left, .footer-container .footer-center, .footer-container .footer-right {
    display: inline-block;
    vertical-align: top;
}

/*CSS cho footer bên trái*/
.footer-container .footer-left {
    width: 30%;
}

/*CSS cho h3 Goblins Go Code của footer bên trái */
.footer-container h3 {
    color: #ffffff;
    font: normal 36px 'Cookie', cursive;
    margin: 0;
}

/*CSS cho h3 Go của footer bên trái */
.footer-container h3 span {
    color: #11ab7c;
}

.footer-container .footer-links {
    color: #ffffff;
    margin: 20px 0 12px;
}

/*CSS cho các icon facebook, about, contact, blog*/
.footer-container .footer-icons{
    margin-left: -1px;
    margin-top: 25px;
}


/*CSS cho HOME ABOUT CONTACT BLOCK */
.footer-container .footer-links a {
    display: inline-block;
    line-height: 1.8;
    text-decoration: none;
    color: inherit;
}

/*CSS cho footer chính giữa*/
.footer-container .footer-center {
    width: 30%;
}

.footer-container .footer-about {
    line-height: 20px;
    color: #92999f;
    font-size: 14px;
    font-weight: normal;
    margin-top: 6px;
}

/*CSS cho chữ ABOUT TEAM*/
.footer-container .footer-about span {
    display: block;
    color: #ffffff;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

/*CSS cho footer bên phải*/
.footer-container .footer-right {
    width: 35%;
}

.footer-container .footer-right i {
    background-color: #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
}

/*CSS cho phần tử google map*/
.footer-container .footer-right i.fa-envelope {
    font-size: 17px;
    line-height: 38px;
}

/*CSS cho các thông tin của google map, phone và mail */
.footer-container .footer-right p {
    display: inline-block;
    color: #ffffff;
    vertical-align: middle;
    margin: 0;
}

/*CSS cho chữ Quy Nhơn*/
.footer-container .footer-right p span {
    display: block;
    font-weight: normal;
    font-size: 14px;
    line-height: 2;
}

/*CSS cho mail goblinsgocode@gmail.com của mail*/
.footer-container .footer-right p a {
    color: #11ab7c;
    text-decoration: none;
}

.footer-container .footer-icons a {
    display: inline-block;
    width: 35px;
    height: 29px;
    cursor: pointer;
    background-color: #33383b;
    border-radius: 2px;
    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;
    margin-right: 3px;
}

.footer-container .footer-icons a:hover,
.footer-links a:hover
 {
    background-color: #11ab7c;
}

@media (max-width: 880px) {
    .footer-container .footer-left, .footer-container .footer-center, .footer-container .footer-right{
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
    }
    .footer-container .footer-center i {
        margin-left: 0;
    }
}     

.my-button {
    display: block;
      width: 150px;
      height: 5%;
      margin: 0 auto;
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
.my-button:hover {
    background-color: #3e8e41;
}

/*Phu's implements*/
.color-red {
    color: red;
}

.color-green {
    color: green;
}

.ques-index {
    display: inline-block;
    margin: 0;
    padding-right: 10px;
    font-weight: bold;
  }
.ques_img{
    width: 20%;
    height: 20%;
}
    </style>
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
                    <div id="para">Ôn tập và thi thử trắc nghiệm Vật Lí online</div>
                </div>

                <!--Các thao tác liên quan đến người dùng-->
                <ul id="nav-infor">
                    <li>
                        <a id="link-to-reg" href="./register.php"><button id="btn-show-username-or-register"
                                style="background-color: rgba(0,0,0,0); border: 0px;"><label
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
                            <li><a id="_10_7" href="./test.php?level=10&chapter=7">Chương 7: Biến dạng của vật rắn. Áp suất chất lỏng</a></li>
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