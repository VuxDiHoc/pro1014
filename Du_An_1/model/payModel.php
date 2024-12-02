<?php
class payModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connDBAss();
    }
    function saveOrder($id_customer, $receiver_name, $receiver_phone, $receiver_address, $cartItems)
    {
        // Thêm hóa đơn vào bảng `bills`
        $sql_bill = "INSERT INTO bills VALUES (null,$id_customer,'$receiver_name','$receiver_phone','$receiver_address',0,CURRENT_TIMESTAMP)";
        $stmt = $this->conn->prepare($sql_bill);
        $stmt->execute();

        // Lấy ID hóa đơn vừa thêm
        $id_bill = $this->conn->lastInsertId();

        foreach ($cartItems as $item) {
            $id_product = $item['id'];
            $name_product = $item['name'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $variant_text = $item['color']; // Dữ liệu text từ session

            // Lấy `id_variant` từ bảng `product_variant` dựa trên `variant_text`
            $sql_get_variant = "SELECT pv.id_variant FROM product_variant pv JOIN variant v ON pv.id_variant = v.id_variant
                    WHERE pv.id_product = $id_product AND v.name_color = '$variant_text'";
            $stmt_get_variant = $this->conn->prepare($sql_get_variant);
            $stmt_get_variant->execute();
            $id_variant = $stmt_get_variant->fetchColumn();

            if (!$id_variant) {
                echo "Không tìm thấy biến thể '$variant_text' cho sản phẩm '$name_product'.";
                return false;
            }

            // Thêm chi tiết vào bảng `detail_bills`
            $sql_detail = "INSERT INTO detail_bills VALUES (null,$id_bill, $id_product,$id_variant, '$name_product', $price * $quantity, $quantity)";
            $stmt_detail = $this->conn->prepare($sql_detail);
            $stmt_detail->execute();
        }
        return true; // Thành công
    }
}