<?php
session_start();
require_once("./php/connect_MySQL_n_log.php");
if (isset($_SESSION['username'])) {
    project_log($con, "Logged out.");
    unset($_SESSION['username']);
}
?>
<script>
window.location.href = "./index.php";
</script>