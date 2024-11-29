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
            $variant_text = $item['color']; // Dữ liệu text từ session (VD: "Red", "XL")

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
            $sql_detail = "INSERT INTO detail_bills VALUES (null,$id_bill, $id_product, '$name_product', $price * $quantity, $quantity)";
            $stmt_detail = $this->conn->prepare($sql_detail);
            $stmt_detail->execute();

            // Lấy số lượng hiện tại trong kho của biến thể
            $sql_check_variant = "SELECT quantity FROM product_variant WHERE id_product = $id_product AND id_variant = $id_variant";
            $stmt_check_variant = $this->conn->prepare($sql_check_variant);
            $stmt_check_variant->execute();
            $current_stock = $stmt_check_variant->fetchColumn();

            if ($current_stock >= $quantity) {
                // Cập nhật số lượng tồn kho của `product_variant`
                $sql_update_variant = "UPDATE product_variant 
                                   SET quantity = quantity - $quantity 
                                   WHERE id_product = $id_product AND id_variant = $id_variant";
                $stmt_update_variant = $this->conn->prepare($sql_update_variant);
                $stmt_update_variant->execute();
            } else {
                echo "Sản phẩm $name_product với biến thể $variant_text không đủ số lượng trong kho.";
                return false;
            }

            // Cập nhật số lượng tổng trong bảng `products`
            $sql_update_product = "UPDATE products SET amount = amount - $quantity WHERE id_product = $id_product";
            $stmt_update_product = $this->conn->prepare($sql_update_product);
            $stmt_update_product->execute();
        }
        return true; // Thành công
    }
}