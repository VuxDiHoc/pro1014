<?php
class billController
{
    public $billModel;
    function __construct()
    {
        $this->billModel = new billModel();
    }
    function listBill()
    {
        $bills = $this->billModel->bill();
        require_once "../commons/function.php";
        require_once "view/listBill.php";
    }
    function updateBill($id){
        $bills = $this->billModel->bill();
        $oneBill = $this->billModel->findBillById($id);
        $status = $this->billModel->billStatus($id);
        $statusDescriptions = [
            0 => "Chờ xác nhận",
            1 => "Đã xác nhận",
            2 => "Chờ lấy hàng",
            3 => "Đang vận chuyển",
            4 => "Đang hoàn trả hàng",
            5 => "Giao hàng thành công",
            6 => "Đã hủy",
        ];
        require_once "../commons/function.php";
        require_once "view/updateBill.php";
        if (isset($_POST['btn_update'])) {
            $status = $_POST['status'];
            if ($this->billModel->updateBill($status,$id)) {
                header("Location:?act=listBill");
            } else {
                echo "Sửa thất bại";
            }
        }
    }
    
}