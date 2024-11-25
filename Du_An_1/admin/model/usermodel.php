<?php
// usermodel.php

require_once '../commons/function.php'; // Include your database connection file

class UserModel {
    public function getAllUsers() {
        $conn = connDBAss();
        $query = "SELECT * FROM users";
        $stmt = $conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertUser($username, $email, $password) {
        $conn = connDBAss();
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function deleteUser($id) {
        $conn = connDBAss();
        $query = "DELETE FROM users WHERE id_user = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Add more methods for updateUser as needed
}
?>
