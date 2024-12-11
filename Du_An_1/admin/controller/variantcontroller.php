<?php
class variantController
{
    public $variantModel;
    function __construct() {
        $this->variantModel = new variantModel(); 
    }
    function listvariant()
    {
   
    $variants = $this->variantModel->loadall_variant(); 
    require_once "view/listvariant.php";
    }
    function insert() {
        require_once "view/addvariant.php";
    
        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
            $tenloai = $_POST['tenloai'];
            if ($this->variantModel->check_variant_exists($tenloai)) {
                echo "<p style='color:red;'>Biến thể đã tồn tại!</p>";
            } else {
                if ($this->variantModel->insert_variant($tenloai)) {
                    echo "<p style='color:green;'>Thêm biến thể thành công!</p>";
                }
            }
        }
    }
    function update($id_variant) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $tenloai = $_POST['tenloai'];
           
            
           
            $this->variantModel->update_variant($id_variant, $tenloai,);
            
            
            header("Location: index.php?act=listvariant");
            exit;
        }
        
        $stmt = $this->variantModel->loadone_variant($id_variant);
        
        require_once "view/updatevariant.php";
    }
    function delete($id_variant) {
        if ($id_variant) {
            
            $this->variantModel->delete_variant($id_variant);   
            
            header("Location: index.php?act=listvariant");
            exit();
        } else {
            
            echo "Không tìm thấy biến thể cần xóa.";
        }
    }
}
?>