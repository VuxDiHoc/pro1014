// CommentController.php
<?php
require_once 'model/CommentModel.php';

class CommentController {
    private $commentModel;

    public function __construct() {
        $this->commentModel = new CommentModel();
    }

    public function showComments($productId) {
        $comments = $this->commentModel->getAllComments($productId);
        // Code để chuyển bình luận tới view
    }

    public function addComment($productId, $userId, $comment) {
        $this->commentModel->addComment($productId, $userId, $comment);
        // Code để chuyển hướng người dùng hoặc hiển thị thông báo thành công
    }

    public function deleteComment($commentId) {
        $this->commentModel->deleteComment($commentId);
        // Code để chuyển hướng người dùng hoặc hiển thị thông báo thành công
    }
}
?>