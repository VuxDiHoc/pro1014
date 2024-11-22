
<?php
require_once 'controller/trangchu.php';
require_once 'model/pdo.php';
require_once 'model/danhmuc.php';
require_once 'controller/dmcontroller.php';




$act=$_GET['act']??'/';
match ($act) {
    '/' => (new trang_chu())->trang_chu(),
    'adddm' => (new adddm())->adddm(),
    'lisdm' => (new lisdm())->lisdm(),
    'xoadm' => (new xoadm())->xoadm(),
    'suadm' => (new suadm())->suadm(),
    'updatedm' => (new updatedm())->updatedm(),






}; 
?>

