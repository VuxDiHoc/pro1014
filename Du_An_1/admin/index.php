<?php

ob_start();
require_once 'controller/categoriescontroller.php';
require_once 'model/categoriesmodel.php';
require_once 'controller/trangchu.php';
require_once '../commons/function.php';
$act=$_GET['act']??'/';
$id_category = $_GET['id_category'] ?? null;
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'addcategories' =>(new catagoriesController())->insert(),
    'listcategories' =>(new catagoriesController())->listcategories(),
    'updatecategories' =>(new catagoriesController())->update($id_category),
    'deletecategories' =>(new catagoriesController())->delete($id_category),
};
ob_end_flush();