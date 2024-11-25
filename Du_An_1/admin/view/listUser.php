<!-- listUser.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Danh sách người dùng</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id_user']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="index.php?act=deleteUser&id_user=<?php echo $user['id_user']; ?>">Xóa</a>
                <!-- Add more actions like Edit here -->
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?act=addUser">Thêm người dùng mới</a>
</body>
</html>
