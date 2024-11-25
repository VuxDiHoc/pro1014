<?php
class thongkeslModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connDBAss(); // Đảm bảo hàm connDBAss() tồn tại và kết nối thành công.
    }
    function thongkesl()
    {
        $sql = "SELECT 
                    categories.id_category AS id_category, 
                    categories.name_cat AS name_cat, 
                    COUNT(products.id_product) AS countsp 
                FROM 
                    products 
                LEFT JOIN 
                    categories 
                ON 
                    products.id_category = categories.id_category 
                GROUP BY 
                    categories.id_category, 
                    categories.name_cat 
                ORDER BY 
                    categories.id_category DESC";
        return $this->conn->query($sql)->fetchAll();
    }
}
?>
