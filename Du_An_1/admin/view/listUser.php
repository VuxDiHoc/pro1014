
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #003366; 
            text-align: center;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007acc; 
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; 
        }

        tr:hover {
            background-color: #e0f7ff;
        }

        a {
            color: #007acc;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #005999;
            text-decoration: underline;
        }

        .add-user-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h1>Danh sách người dùng</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php
        if (!empty($users)) {
            foreach ($users as $user):
        ?>
                <tr>
                    <td><?= $user['id_user'] ?? '' ?></td>
                    <td><?= $user['email'] ?? '' ?></td>
                    <td>
                        <a href="index.php?act=deleteUser&id_user=<?= $user['id_user'] ?? '' ?>">Xóa</a>
                    </td>
                </tr>
        <?php
            endforeach;
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu người dùng</td></tr>";
        }
        ?>
    </table>
    <a href="index.php?act=addUser" class="add-user-link">Thêm người dùng mới</a>
</body>

</html>
