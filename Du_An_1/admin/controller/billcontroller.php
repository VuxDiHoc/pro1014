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
        $statusDescriptions = [
            0 => 'Đang xử lý',
            1 => 'Đã xử lý',
            2 => 'Đang đóng gói và vận chuyển',
            3 => 'Đang vận chuyển đến người nhận',
            4 => 'Nhận hàng thành công',
            5 => 'User từ chối nhận hàng',
            6 => 'User hủy đơn'
        ];
        require_once "view/listBill.php";
    }
    function updateBill($id){
        $bills = $this->billModel->bill();
        $oneBill = $this->billModel->findBillById($id);
        $status = $this->billModel->billStatus($id);
        $statusDescriptions = [
            0 => 'Đang xử lý',
            1 => 'Đã xử lý',
            2 => 'Đang đóng gói và vận chuyển',
            3 => 'Đang vận chuyển đến người nhận',
            4 => 'Nhận hàng thành công',
            5 => 'User từ chối nhận hàng',
            6 => 'User hủy đơn'
        ];
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