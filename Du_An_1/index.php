<?php
require_once 'controller/maincontroller.php';
require_once 'controller/aboutcontroller.php';
require_once 'controller/shopcontroller.php';
require_once 'controller/contactcontroller.php';
require_once 'controller/giohangcontroller.php';
require_once 'controller/shop-singleController.php';
require_once 'model/shop-singleModel.php';
require_once 'model/shopModel.php';
require_once 'commons/function.php';

$act=$_GET['act']??'/';
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'about' => (new aboutController())->about(),
    'shop' => (new shopController())->allProduct(),
    'shop_cat' => (new shopController())->cat_pro($_GET['id']),
    'shop_single' => (new detailController())->detail($_GET['id']),
    'contact' => (new contactController())->contact(),
    'giohang' => (new giohangController())->giohang(),
    'addComment' => (new detailController())->addComment(),
};