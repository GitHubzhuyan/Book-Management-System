<?php
session_start();
include 'conn.php';
$username = $_POST['username'];
$password = $_POST['password'];
if ($username=='admin'){
    $hash=hash('sha256', $password);
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$hash'";
    print_r($hash);
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_user'] = $row['username'];
        header('Location:index.php');
    }else{
        echo '<script>alert("账号或密码错误，请重新输入");window.location.href="index.php";</script>';
    }
}elseif($username&&$password){
    $hash=hash('sha256', $password);
    $sql = "SELECT * FROM reader WHERE phone='$username' AND password='$hash'";
    $result = mysqli_query($conn, $sql);
    print_r($result);
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['phone'];
        $_SESSION['card_id']=$row['card_id'];
        header('Location:index.php');
    }else{
        echo '<script>alert("账号或密码错误，请重新输入");window.location.href="index.php";</script>';
    }
}
mysqli_close($conn);
