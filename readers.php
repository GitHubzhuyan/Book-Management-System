
<h1>读者信息管理</h1>
<?php require_once 'autoload.php';
view('nav.php'); ?>
<a href="#" onclick="toggleForm()">添加</a>
<form id="add-book-form" action="readersPro.php" method="post" style="display:none;">
    <table>
        <tr>
            <td>借书证编号：</td>
            <td><input type="text" name="card_id" required></td>
        </tr>
        <tr>
            <td>读者姓名：</td>
            <td><input type="text" name="reader_name" required></td>
        </tr>
        <tr>
            <td>读者性别：</td>
            <td>
                <input type="radio" name="reader_gender" value="男" checked> 男
                <input type="radio" name="reader_gender" value="女"> 女
            </td>
        </tr>
        <tr>
            <td>出生日期：</td>
            <td><input type="date" name="birthday" required></td>
        </tr>
        <tr>
            <td>联系方式：</td>
            <td><input type="text" name="contact" required></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
<script src="script/script.js"></script>
<table>
    <tr>
        <th>借书证编号</th>
        <th>读者姓名</th>
        <th>读者性别</th>
        <th>出生日期</th>
        <th>联系方式</th>
        <th>操作</th>
    </tr>

    <?php

    // 显示读者信息
    include 'conn.php';

    $sql = 'SELECT * FROM reader';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['card_id'] . '</td>';
        echo '<td>' . $row['read_name'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['birthday'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo "<td><a href='readersPro.php?card_id=" . $row['card_id'] . "&action=update'>编辑</a>
 <a href='readersPro.php?card_id=" . $row['card_id'] . "&action=delete'
 onclick='return confirmDelete()'>删除</a></td>";
        echo '</tr>';
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>