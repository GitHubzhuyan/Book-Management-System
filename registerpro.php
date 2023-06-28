<?php
include 'conn.php';
if ($_POST){
    if ($_POST['re_password']==$_POST['re_password1'])
    {
        $read_name = $_POST['username'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $password =$_POST['re_password'];
        $hash = hash('sha256', $password);
        $phone=$_POST['phone'];
        $sql = "INSERT INTO reader ( read_name,gender,birthday,phone,password) 
VALUES ('$read_name','$gender','$birthday','$phone','$hash')";
        mysqli_query($conn, $sql);
        echo "<script>";
        echo "alert('注册成功');";
        echo "location.href='Index.php';";
        echo "</script>";
        exit();
    }else{
        echo "<script>";
        echo "alert('密码不一致');";
        echo "location.href='register.php';";
        echo "</script>";
        exit();
    }
}else{
    echo "<script>";
    echo "alert(' 非法访问');";
    echo "location.href='index.php';";
    echo "</script>";
    exit();
}
