<?php
// 处理图书信息
include 'conn.php';
session_start();
if ($_SESSION['user'])
if ($_POST) {
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $num = $_POST['num'];
    $sql = "INSERT INTO book ( book_name, book_author, publisher, price, num) 
VALUES ('$book_name', '$book_author', '$publisher', $price, $num)";
    mysqli_query($conn, $sql);
}
if ($_GET) {
    $book_id = $_GET['book_id'];
    $action = $_GET['action'];
    if ($action == 'delete') {
        $sql = "DELETE FROM book WHERE book_id='$book_id'";
        mysqli_query($conn, $sql);
    }
//    elseif ($action == 'update') {
//        $sql = "DELETE FROM book WHERE book_id='$book_id'";
//        mysqli_query($conn, $sql);
//    }
    mysqli_close($conn);
    header('Location: book.php');

}?>