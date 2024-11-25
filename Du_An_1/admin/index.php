<?php

ob_start();
require_once 'controller/categoriescontroller.php';
require_once 'model/categoriesmodel.php';
require_once 'controller/variantcontroller.php';
require_once 'model/variantmodel.php';
require_once 'controller/trangchu.php';
require_once 'controller/productcontroller.php';
require_once 'controller/billcontroller.php';
require_once 'model/productmodel.php';
require_once 'model/billmodel.php';
require_once '../commons/function.php';
require_once './commons/function.php';
require_once 'controller/usercontroller.php';
// index.php

// Bao gồm tệp chứa lớp CommentController


// Tạo đối tượng CommentController

// Các hành động tiếp theo...

$act = $_GET['act'] ?? '/';
$id_category = $_GET['id_category'] ?? null;
$id_variant = $_GET['id_variant'] ?? null;
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'listProduct' => (new productController())->listProduct(),
    'insertProduct' => (new productController())->insert(),
    'updateProduct' => (new productController())->update($_GET['id']),
    'deleteProduct' => (new productController())->delete($_GET['id']),
    'listProduct_variant' => (new productController())->listProduct_variant(),
    'updateProduct_variant' => (new productController())->updateProduct_variant($_GET['id_pro'], $_GET['id_var']),
    'deleteProduct_variant' => (new productController())->deleteProduct_variant($_GET['id_pro'], $_GET['id_var']),
    'listBill' => (new billController())->listBill(),
    'updateBill' => (new billController())->updateBill($_GET['id']),
    'addvariant' => (new variantController())->insert(),
    'listvariant' => (new variantController())->listvariant(),
    'updatevariant' => (new variantController())->update($id_variant),
    'deletevariant' => (new variantController())->delete($id_variant),
    'addcategories' => (new catagoriesController())->insert(),
    'listcategories' => (new catagoriesController())->listcategories(),
    'updatecategories' => (new catagoriesController())->update($id_category),
    'deletecategories' => (new catagoriesController())->delete($id_category),
    'listUser' => (new UserController())->listUsers(),
    'addUser' => (new UserController())->addUser(),
    'insertUser' => (new UserController())->insertUser(),
    'deleteUser' => (new UserController())->deleteUser($id_user),
    default => throw new Exception("No matching action found for '$act'"),
};

ob_end_flush();
