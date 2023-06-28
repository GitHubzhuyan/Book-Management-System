<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>读者借阅</h1>
<li><a href="logout.php">退出登录</a></li>
<a href="#" onclick="toggleForm()">借阅</a>
<form id="add-book-form" action="borrowPro.php" method="post" style="display:none;">
    <table>
        <tr>
            <td>书籍编号：</td>
            <td><input type="text" name="book_id" required></td>
        </tr>
        <tr>
            <td>借书时间：</td>
            <td><input type="date" name="borrow_time" required></td>
        </tr>
        <tr>
            <td>还书时间：</td>
            <td><input type="date" name="return_time" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
<script src="script/script.js"></script>
<table>
    <tr>
        <th>书籍编号</th>
        <th>书籍名称</th>
        <th>书籍作者</th>
        <th>出版社</th>
        <th>单价</th>
        <th>库存量</th>
    </tr>
<?php
// 显示书籍信息
include 'conn.php';

$sql = 'SELECT * FROM book';
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['book_id'] . '</td>';
    echo '<td>' . $row['book_name'] . '</td>';
    echo '<td>' . $row['book_author'] . '</td>';
    echo '<td>' . $row['publisher'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . $row['num'] . '</td>';
    echo '</tr>';
}
mysqli_close($conn);
?>
</table>
</body>
</html>
