<?php
session_start();
require_once("./html/header.php");
?>
<h2>Xin chào!</h2>
<p>Chào mừng đã đến với trang ôn tập thi trắc nghiêm môn Vật lí - một dự án nhở của nhóm GGC (Goblin Go Code).</p>
<p>Đây là 1 dự án nhỏ, tất nhiên sẽ có "một ít" sai sót, hi vọng các bạn có thể đóng góp giúp dự án trở nên hoàn thiện
    hơn.</p>
<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
?>