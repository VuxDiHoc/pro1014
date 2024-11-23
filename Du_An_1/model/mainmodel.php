
<?php




class MainModel {
    // Các hàm khác...

    // Hàm lấy bình luận cho sản phẩm
    public function getComments($productId) {
        $stmt = $this->conn->prepare("SELECT comments.content, comments.created_at, users.username FROM comments JOIN users ON comments.id_user = users.id_user WHERE comments.id_product = ? ORDER BY comments.created_at DESC");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Hàm thêm bình luận mới
    public function addComment($productId, $userId, $content) {
        $stmt = $this->conn->prepare("INSERT INTO comments (id_product, id_user, content) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $productId, $userId, $content);
        return $stmt->execute();
    }
}
?>