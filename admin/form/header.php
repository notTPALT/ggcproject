<header>
  <div style="display: flex; align-items: center; justify-content: space-between; background-color: #B8860B; padding: 10px;">
    <div>
      <a href="index.php"><img width="60px" src="../resources/favicon.png" alt="Logo"></a>
    </div>
    <div style="text-align: center;">
      <h1 style="margin: 0;">Hệ thống quản lý GGC</h1>
    </div>
    <div style="text-align: right;">
      <p style="margin: 0;">Welcome, <?php echo $username; ?>!</p>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="submit" name="logout" value="Đăng xuất" style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer;">
      </form>
    </div>
  </div>
</header>