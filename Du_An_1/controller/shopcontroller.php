<?php
class shopController{
    public $shopModel;
    function __construct()
    {
        $this->shopModel = new shopModel();
    }
    
    function allProduct() {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = $_POST['search'];
            $product = $this->shopModel->searchProducts($search); 
        } else {
            $product = $this->shopModel->allProduct();
        }
        $category = $this->shopModel->allCategory();
        require_once 'view/shop.php';
    }
    function cat_pro($id)
    {
        if (isset($_POST['search'])) {
            $product = $this->shopModel->searchProduct($_POST['search']);
        } else {
            $product = $this->shopModel->cat_pro($id);
        }
        $category = $this->shopModel->allCategory();
        require_once 'view/shop.php';
    }
}