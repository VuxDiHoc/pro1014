<?php
class shopModel{
    public $conn;
    function __construct() {
        $this->conn = connDBAss();
    }
    function allProduct() {
        $sql="SELECT * FROM products order by id_product desc";
        return $this->conn->query($sql)->fetchAll();
    }
    function cat_pro($id) {
        $sql="SELECT * FROM products WHERE id_category = $id";
        return $this->conn->query($sql)->fetchAll();
    }
    function allCategory(){
        $sql="SELECT * FROM categories";
        return $this->conn->query($sql)->fetchAll();
    }
    function searchProducts($search){
        $sql="SELECT * FROM products WHERE name LIKE '%".$search."%'";
        return $this->conn->query($sql)->fetchAll();
    }
    function searchProduct($search){
        $sql="SELECT * FROM products WHERE id_category = 1 and name LIKE '%".$search."%'";
        return $this->conn->query($sql)->fetchAll();
    }
}