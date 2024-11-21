<?php
ob_start();
require_once 'controller/trangchu.php';
require_once 'controller/productcontroller.php';
require_once 'controller/billcontroller.php';
require_once 'model/productmodel.php';
require_once 'model/billmodel.php';
require_once '../commons/function.php';

$act=$_GET['act']??'/';
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'listProduct' => (new productController())->listProduct(),
    'insertProduct' => (new productController())->insert(),
    'updateProduct'=> (new productController())->update($_GET['id']),
    'deleteProduct'=> (new productController())->delete($_GET['id']),
    'listProduct_variant'=> (new productController())->listProduct_variant(),
    'updateProduct_variant'=>(new productController())->updateProduct_variant($_GET['id_pro'],$_GET['id_var']),
    'deleteProduct_variant'=>(new productController())->deleteProduct_variant($_GET['id_pro'],$_GET['id_var']),
    'listBill'=>(new billController())->listBill(),
    'updateBill'=>(new billController())->updateBill($_GET['id']),
};

ob_end_flush();