<h1>图书信息管理</h1>
<?php require_once 'autoload.php';
view('nav.php'); ?>
<a href="#" onclick="toggleForm()">添加</a>
<form id="add-book-form" action="bookPro.php" method="post" style="display:none;">
    <table>
        <tr>
            <td>书籍名称：</td>
            <td><input type="text" name="book_name" required></td>
        </tr>
        <tr>
            <td>书籍作者：</td>
            <td><input type="text" name="book_author" required></td>
        </tr>
        <tr>
            <td>出版社：</td>
            <td><input type="text" name="publisher" required></td>
        </tr>
        <tr>
            <td>单价：</td>
            <td><input type="float" name="price" required></td>
        </tr>
        <tr>
            <td>库存量：</td>
            <td><input type="number" name="num" required></td>
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
        <th>操作</th>
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
        echo '<td><a href="bookPro.php?book_id=' . $row['book_id'] . '&action=update">编辑</a>
              <a href="bookPro.php?book_id=' . $row['book_id'] . '&action=delete"
               onclick="return confirmDelete()">删除</a></td>';
        echo '</tr>';
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>