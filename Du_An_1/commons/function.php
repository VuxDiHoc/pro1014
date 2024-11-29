<?php
function connDBAss()
{
    $host = "mysql:host=localhost;dbname=pro1014;charset=utf8";
    $user = "root";
    $pass = "";
    try {
        $conn = new PDO($host, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
function getOrderStatus($status)
{
    $statuses = [
        0 => "Chờ xác nhận",
        1 => "Đã xác nhận",
        2 => "Chờ lấy hàng",
        3 => "Đang vận chuyển",
        4 => "Đang hoàn trả hàng",
        5 => "Giao hàng thành công",
        6 => "Đã hủy",
    ];
    return $statuses[$status] ?? "Không xác định";
}
function renderOrders($orders) {
    if (!empty($orders)) {
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Ngày mua</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($orders as $order) {
            echo "<tr>
                    <td>{$order['id_bill']}</td>
                    <td>{$order['name_product']}</td>
                    <td>{$order['quantity']}</td>
                    <td>" . number_format($order['price'] * $order['quantity']) . " đ</td>
                    <td>" . getOrderStatus($order['status']) . "</td>
                    <td>{$order['purchase_date']}</td>
                </tr>";
        }
        echo '</tbody></table>';
    } else {
        echo '<div class="text-center mt-5">
                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/account/empty-order.png" alt="Empty orders" class="img-fluid mb-3" style="max-width: 150px;">
                <p>Chưa có đơn hàng</p>
            </div>';
    }
}