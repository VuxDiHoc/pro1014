<?php
class orderController
{
    public $orderModel;
    function __construct()
    {
        $this->orderModel = new orderModel();
    }
    function order($id)
    {
        $orders = $this->orderModel->getOrdersByStatus($id); // Lấy tất cả đơn hàng
        $orderStatuses = [];
        // Lấy danh sách đơn hàng cho từng trạng thái
        for ($status = 0; $status <= 6; $status++) {
            $orderStatuses[$status] = $this->orderModel->getOrdersByStatus($id, $status);
        }
        $tabIds = [
            0 => "pending-payment",
            1 => "processing",
            2 => "awaiting-pickup",
            3 => "shipping",
            4 => "return-request",
            5 => "successful-delivery",
            6 => "cancelled"
        ];
        $tabLabels = [
            0 => "Chờ xác nhận",
            1 => "Đã xác nhận",
            2 => "Chờ lấy hàng",
            3 => "Đang vận chuyển",
            4 => "Yêu cầu trả hàng",
            5 => "Giao hàng thành công",
            6 => "Đã hủy"
        ];
        require_once "commons/function.php";
        require_once 'view/order.php';
    }

}