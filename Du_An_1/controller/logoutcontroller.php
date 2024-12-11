<?php
class LogoutController
{
    function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        session_start();
        $_SESSION['success_message'] = "Đăng xuất thành công!";
        header('Location: index.php');
        exit;
    }
}
