<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>图书管理系统 - 主页面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="Index.php">主页</a>
<div class="login-container">
    <h2>用户注册</h2>
    <form action="registerpro.php" method="post">
        <div class="form-group">
            <label></label>
            <input type="text" name="username" placeholder="请输入姓名" required>
            <label></label>
           <input type="date" name="birthday" placeholder="" required>
        </div>
        <select name="gender" id="" class="">
            <option value="">--选择性别--</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
        <div class="form-group">
            <label></label>
            <input type="text" name="phone" placeholder="请输入电话" required>
            <label></label>
            <input type="password" name="re_password" placeholder="请输入密码" required>
            <label></label>
            <input type="password" name="re_password1" placeholder="请确认密码" required>
        </div>
        <button class="btn"action='register'>确定</button>
    </form>
</div>
