<!-- addUser.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <h1>Thêm người dùng mới</h1>
    <form action="index.php?act=insertUser" method="post">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Thêm người dùng">
    </form>
</body>
</html>
