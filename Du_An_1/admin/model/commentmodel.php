<?php
class CommentModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connDBAss();
    }

    function getAllComments()
    {
        $sql = "SELECT comments.*, products.name as product_name, users.email as user_email 
                FROM comments 
                JOIN products ON comments.id_product = products.id_product 
                JOIN users ON comments.id_user = users.id_user 
                ORDER BY comments.day_post DESC";
        return $this->conn->query($sql)->fetchAll();
    }

    function updateCensorship($id_comment, $censorship)
    {
        $sql = "UPDATE comments SET censorship = ? WHERE id_comment = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$censorship, $id_comment]);
    }

    function deleteComment($id_comment)
    {
        $sql = "DELETE FROM comments WHERE id_comment = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_comment]);
    }
}