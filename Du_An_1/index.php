<?php
session_start();

require_once 'controller/maincontroller.php';
require_once 'controller/aboutcontroller.php';
require_once 'controller/shopcontroller.php';
require_once 'controller/contactcontroller.php';
require_once 'controller/giohangcontroller.php';
require_once 'commons/function.php';
require_once 'controller/commentcontroller.php';
require_once 'controller/logincontroller.php';
require_once 'controller/logoutcontroller.php';
require_once 'controller/registercontroller.php';

$act = $_GET['act'] ?? '/';
$action = $_GET['action'] ?? '';

// Xử lý các action của comment riêng biệt
if (!empty($action)) {
    $commentController = new CommentController();
    match ($action) {
        'showComments' => $commentController->showComments($_GET['productId'] ?? 0),
        'addComment' => $commentController->addComment(
            $_GET['productId'] ?? 0,
            $_POST['userId'] ?? 0,
            $_POST['comment'] ?? ''
        ),
        'deleteComment' => $commentController->deleteComment($_GET['commentId'] ?? 0),
        default => null,
    };
}

// Xử lý các route chính của ứng dụng
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'about' => (new aboutController())->about(),
    'shop' => (new shopController())->shop(),
    'shop_single' => (new shopController())->shop_single(),
    'contact' => (new contactController())->contact(),
    'giohang' => (new giohangController())->giohang(),
    'login' => (new LoginController())->login(),
    'logout' => (new LogoutController())->logout(),
    'register' => (new RegisterController())->register(),
    default => (new trang_chu())->trang_chu(),
};
