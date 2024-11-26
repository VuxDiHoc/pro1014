<?php
class detailController
{
    public $detailModel;
    function __construct()
    {
        $this->detailModel = new detailModel();
    }
    function detail($id)
    {
        $this->detailModel->updateView($id);
        $productOne = $this->detailModel->findProductById($id);
        $comments = $this->detailModel->allComment($id);
        $product_variant = $this->detailModel->product_variant($id);
        // $relatedProduct= $this->detailModel->relatedProduct($productOne['id_cat'],$id);
        require_once 'view/shop-single.php';
    }
    function addComment()
    {
        if (isset($_POST['detail']) && isset($_POST['id_pro'])) {
            if (!isset($_SESSION['user'])) {
                echo "Bạn cần đăng nhập để có thể bình luận";
                exit();
            }
            $content = $_POST['detail'];
            $id_user = $_SESSION['user']['id_user'];
            $id_pro = $_POST['id_pro'];
            $this->detailModel->addComment($id_pro, $id_user, $content);
            exit();
        }
    }

}