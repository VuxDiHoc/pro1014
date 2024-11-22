<?php
require_once 'controller/variantcontroller.php';
require_once 'model/variantmodel.php';
require_once 'controller/trangchu.php';
require_once '../commons/function.php';
$act=$_GET['act']??'/';
$id_variant = $_GET['id_variant'] ?? null;
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'addvariant' =>(new variantController())->insert(),
    'listvariant' =>(new variantController())->listvariant(),
    'updatevariant' =>(new variantController())->update($id_variant),
    'deletevariant' =>(new variantController())->delete($id_variant),
};