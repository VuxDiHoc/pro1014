<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Danh sách người dùng</title>
                <style>
                


.container {
    background-color: #ffffff;
    margin: 40px auto;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    animation: fadeIn 0.5s ease-in-out;
}

h1 {
    font-size: 28px;
    color: #1a1a2e;
    margin-bottom: 30px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    position: relative;
}

h1::after {
    content: '';
    /* display: block; */
    width: 80px;
    height: 4px;
    background-color: #3f72af;
    margin: 10px auto 0;
    border-radius: 4px;
}

.add-user {
    text-align: right;
    margin-bottom: 30px;
}

.add-user a {
    background-color: #3f72af;
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(63, 114, 175, 0.2);
    transition: all 0.3s ease-in-out;
}

.add-user a:hover {
    background-color: #112d4e;
    box-shadow: 0 8px 20px rgba(17, 45, 78, 0.3);
    transform: translateY(-3px);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 16px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 16px 20px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

th {
    background-color: #f8f9fa;
    color: #1a1a2e;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border-bottom: 2px solid #dee2e6;
}

tr:nth-child(even) {
    background-color: #f9fbfd;
}

tr:hover {
    background-color: #dbe2ef;
    transition: background-color 0.3s ease;
}

td a {
    background-color: #3f72af;
    color: white;
    padding: 10px 16px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 600;
    transition: all 0.3s ease;
}

td a:hover {
    background-color: #112d4e;
    transform: translateY(-2px);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #1a1a2e;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #cdd4db;
    border-radius: 8px;
    font-size: 15px;
    background-color: #fff;
    transition: all 0.3s ease-in-out;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #3f72af;
    box-shadow: 0 0 10px rgba(63, 114, 175, 0.4);
}

.form-group button {
    background-color: #3f72af;
    color: white;
    padding: 14px 24px;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.form-group button:hover {
    background-color: #112d4e;
    box-shadow: 0 6px 12px rgba(17, 45, 78, 0.3);
    transform: translateY(-3px);
}

/* Hiệu ứng Fade-in
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
} */

                </style>


            </head>

            <body>
                <div class="container">
                    <h1>Danh sách người dùng</h1>
                    <div class="add-user">
                        <a href="index.php?act=addUser">Thêm người dùng mới</a>
                    </div>
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
                </div>
            </body>

            </html>
            <?php
            require_once 'layout/scripts.php';
            require_once 'layout/footer.php';
            ?>
