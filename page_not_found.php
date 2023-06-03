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
        <?php require_once("./html/header.php"); ?>
        <!--Nội dung của trang-->
        <div class="container-content">
            <div id="box-content" class="box-content">
                <h1 style="max-width: max-content; margin: 0 auto;">404: Trang không tồn tại</h1>
                <p>Trang mà bạn đang cố gằng truy cập không có sẵn trên trang web của chúng tôi.</p>
                <a href="./index.php">Trở về trang chủ</a>
            </div>
        </div>
        <?php 
                echo file_get_contents("./html/footer.html");
                require_once("./php/review_retrieve_data.php");
        ?>
    </div>
</body>

</html>