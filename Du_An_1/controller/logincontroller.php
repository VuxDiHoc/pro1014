<?php
require_once 'model/user.php';

class LoginController
{
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Giả sử bạn có hàm để kiểm tra thông tin đăng nhập
            $user = checkLogin($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                // Chuyển hướng đến trang chủ hoặc trang mong muốn sau khi đăng nhập thành công
                header('Location: index.php');
                exit;
            } else {
                $error = "Thông tin đăng nhập không đúng.";
            }
        }
        require_once 'view/login.php';
    }
}

