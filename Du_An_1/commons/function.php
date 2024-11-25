<?php
function connDBAss() {
    $host="mysql:host=localhost;dbname=pro1014;charset=utf8";
    $user="root";
    $pass="";
    try {
        $conn = new PDO($host, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } 
    catch (PDOException $th) {
        echo $th->getMessage();
    }
    // function.php
function getAllComments($productId) {
    // Kết nối tới cơ sở dữ liệu và lấy tất cả bình luận của một sản phẩm cụ thể
}

function addComment($productId, $userId, $comment) {
    // Kết nối tới cơ sở dữ liệu và thêm bình luận mới
}

function deleteComment($commentId) {
    // Kết nối tới cơ sở dữ liệu và xóa bình luận
}

}
