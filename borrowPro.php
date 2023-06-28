<?php
// 处理借阅信息
include 'conn.php';
session_start();
if ($_SESSION['user'])
{
    $book_id = $_POST['book_id'];
    $card_id =$_SESSION['card_id'];
    $borrow_time = $_POST['borrow_time'];
    $return_time = $_POST['return_time'];
    $sql = "INSERT INTO borrow (book_id, card_id, borrow_time, return_time) 
VALUES ('$book_id', '$card_id', '$borrow_time', '$return_time')";
    mysqli_query($conn, $sql);
    echo "<script>";
    echo "alert(' 借阅成功');";
    echo "location.href='user_borrow.php';";
    echo "</script>";
    exit();
}
if ($_POST['book_id']&&$_POST['card_id']&&$_POST['borrow_time']&&$_POST['return_time']) {
    $book_id = $_POST['book_id'];
    $card_id = $_POST['card_id'];
    $borrow_time = $_POST['borrow_time'];
    $return_time = $_POST['return_time'];
    $sql = "INSERT INTO borrow (book_id, card_id, borrow_time, return_time) 
VALUES ('$book_id', '$card_id', '$borrow_time', '$return_time')";
    mysqli_query($conn, $sql);
    echo "<script>";
    echo "alert(' 添加成功');";
    echo "location.href='borrow.php';";
    echo "</script>";
    exit();
}else if($_GET){
    $id = $_GET['id'];
    echo $id;
    $action = $_GET['action'];

    if ($action == 'return') {
        // 修改还书时间为空
        $sql = "UPDATE borrow SET return_time=NULL WHERE borrow_id='$id'";
        mysqli_query($conn, $sql);
    } else if ($action == 'delete') {
        // 删除借阅信息
        $sql = "DELETE FROM borrow WHERE borrow_id='$id'";
        mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);
header('Location: borrow.php');
?>