<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>图书管理系统 - 主页面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['admin_user'])){
    ?>
    <h1>图书管理系统</h1>
    <p>欢迎管理员 <?php echo $_SESSION['admin_user']; ?>，您已成功登录系统。</p>
    <hr/>
    <ul>
        <li><a href="book.php">图书信息管理</a></li>
        <li><a href="borrow.php">借阅管理</a></li>
        <li><a href="readers.php">读者信息管理</a></li>
        <li><a href="logout.php">退出登录</a></li>
    </ul>
    <?php
}elseif(isset($_SESSION['user'])){
    ?>
    <h1>图书管理系统</h1>
    <p>欢迎用户 <?php echo $_SESSION['user']; ?>，您已成功登录系统。</p>
    <hr/>
    <ul>
        <li><a href="user_borrow.php">图书借阅</a></li>
        <li><a href="logout.php">退出登录</a></li>
    </ul>
    <?php
}else{
    ?>
    <div class="login-container">
        <h2>用户登录</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label></label>
                <input type="text" name="username" placeholder="请输入账号" required>
            </div>
            <div class="form-group">
                <label></label>
                <input type="password" name="password" placeholder="请输入密码" required>
            </div>
            <button class="btn">登录</button>
            <button class="btn"onclick="window.location.href='register.php'">注册</button>
        </form>
    </div>
    <?php
}
?>
</body>
</html>