<?php
class catagoriesController
{
    public $categoriesModel;
    function __construct() {
        $this->categoriesModel = new categoriesModel(); 
    }
    function listcategories()
    {
    
    $categoriess= $this->categoriesModel->loadall_categories(); 
    require_once "view/listcategories.php";
    }
    function insert() {
        require_once "view/addcategories.php";
    
        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
            $tenloai = $_POST['tenloai'];
            if ($this->categoriesModel->check_categories_exists($tenloai)) {
                echo "<p style='color:red;'>Biến thể đã tồn tại!</p>";
            } else {
                if ($this->categoriesModel->insert_categories($tenloai)) {
                    echo "<p style='color:green;'>Thêm biến thể thành công!</p>";
                }
            }
        }
    }
    function update($id_category) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $tenloai = $_POST['tenloai'];
           
            
            
            $this->categoriesModel->update_categories($id_category, $tenloai,);
            
            
            header("Location: index.php?act=listcategories");
            exit;
        }
        
        $stmt = $this->categoriesModel->loadone_categories($id_category);
        
        require_once "view/updatecategories.php";
    }
    function delete($id_category) {
        if ($id_category) {
            
            $this->categoriesModel->delete_categories($id_category);   
            
            header("Location: index.php?act=listcategories");
            exit();
        } else {
            
            echo "Không tìm thấy biến thể cần xóa.";
        }
    }
}
?>