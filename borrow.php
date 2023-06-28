<h1>借阅管理</h1>
<?php require_once 'autoload.php';
view('nav.php'); ?>
<a href="#" onclick="toggleForm()">添加</a>
<form id="add-book-form" action="borrowPro.php" method="post" style="display:none;">
    <table>
        <tr>
            <td>书籍编号：</td>
            <td><input type="text" name="book_id" required></td>
        </tr>
        <tr>
            <td>借书证编号：</td>
            <td><input type="text" name="card_id" required></td>
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
        <th>书籍名称</th>
        <th>借书证编号</th>
        <th>读者姓名</th>
        <th>借书时间</th>
        <th>还书时间</th>
        <th>操作</th>
    </tr>

    <?php

    // 显示借阅信息
    include 'conn.php';

    $sql = 'SELECT * FROM borrow';
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        // 根据借书证编号查询读者姓名
        $card_id = $row['card_id'];
        $book_id = $row['book_id'];
        $reader_name = mysqli_fetch_array(mysqli_query($conn, "SELECT read_name FROM reader WHERE card_id='$card_id'"))['read_name'];
        $book_name = mysqli_fetch_array(mysqli_query($conn, "SELECT book_name FROM book WHERE book_id='$book_id'"))['book_name'];

        echo '<tr>';
        echo '<td>' . $book_name . '</td>';
        echo '<td>' . $card_id . '</td>';
        echo '<td>' . $reader_name . '</td>';
        echo '<td>' . $row['borrow_time'] . '</td>';
        echo '<td>' . $row['return_time'] . '</td>';
        echo '<td><a href="borrowPro.php?id=' . $row['borrow_id'] . '&action=return">归还</a>
 <a href="borrowPro.php?id=' . $row['borrow_id'] . '&action=delete"onclick="return confirmDelete()">删除</a></td>';
        echo '</tr>';
    }

    mysqli_close($conn);

    ?>

</table>
</body>
</html>