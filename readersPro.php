<?php
// 处理读者信息
include 'conn.php';
if ($_POST) {
    $card_id = $_POST['card_id'];
    $read_name = $_POST['reader_name'];
    $reader_gender = $_POST['reader_gender'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $password=password_hash($_POST['password']);
    $sql = "INSERT INTO reader (card_id, read_name, gender, birthday, password,phone) 
VALUES ('$card_id', '$read_name', '$reader_gender', '$birthday','$password','$phone')";
    mysqli_query($conn, $sql);
}
if ($_GET) {
    $card_id = $_GET['card_id'];
    $action = $_GET['action'];
    if ($action == 'delete') {
        $sql = "DELETE FROM reader WHERE card_id='$card_id'";
        mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);

header('Location: readers.php');
?>