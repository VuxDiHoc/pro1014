<?php


// Include các tệp cần thiết
require_once 'controller/cartcontroller.php';
require_once 'controller/maincontroller.php';
require_once 'controller/aboutcontroller.php';
require_once 'controller/shopcontroller.php';
require_once 'controller/contactcontroller.php';
require_once 'controller/shop-singleController.php';
require_once 'model/shop-singleModel.php';
require_once 'model/shopModel.php';
require_once 'commons/function.php';
require_once 'controller/commentcontroller.php';
require_once 'controller/logincontroller.php';
require_once 'controller/logoutcontroller.php';
require_once 'controller/registercontroller.php';

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

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
    'shop' => (new shopController())->allProduct(),
    'shop_cat' => (new shopController())->cat_pro($_GET['id']),
    'shop_single' => (new detailController())->detail($_GET['id']),
    'contact' => (new contactController())->contact(),
    'cart' => (new cartController())->cart(),
    'login' => (new LoginController())->login(),
    'logout' => (new LogoutController())->logout(),
    'register' => (new RegisterController())->register(),
    'addComment' => (new detailController())->addComment(),
    'addToCart' => (new cartController())->addToCart(),
    'deleteToCart' => (new cartController())->deleteToCart(),

};
