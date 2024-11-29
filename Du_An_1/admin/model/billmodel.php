<?php
class billModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connDBAss();
    }
    function bill()
    {
        $sql = "SELECT * FROM bills";
        return $this->conn->query($sql)->fetchAll();
    }
    function findBillById($id)
    {
        $sql = "SELECT * FROM detail_bills WHERE id_bill=$id";
        return $this->conn->query($sql)->fetchAll();
    }
    function billStatus($id){
        $sql = "SELECT status FROM bills WHERE id_bill=$id";
        return $this->conn->query($sql)->fetch();
    }
    function updateBill($status,$id_bill){
        $sql = "UPDATE bills SET status=$status WHERE id_bill=$id_bill";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }

}