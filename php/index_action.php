<script src="./js/index.js"></script>

<?php
    $str = "none";
    if (isset($_SESSION['username'])) {
        $str = $_SESSION['username'];
    }
    echo "<script>init_index_buttons('".$str."');</script>";
?>