<?php
class orderModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connDBAss();
    }
    function getOrdersByStatus($id, $status = null)
    {
        $sql = "SELECT * FROM bills JOIN detail_bills ON bills.id_bill = detail_bills.id_bill WHERE id_customer = $id";
        if ($status !== null) {
            $sql .= " AND status = $status";
        }
        return $this->conn->query($sql)->fetchAll();
    }
}