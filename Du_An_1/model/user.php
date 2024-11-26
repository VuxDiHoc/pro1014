<?php
require_once 'commons/function.php';

function checkLogin($email, $password)
{
    try {
        $conn = connDBAss();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $hashedPassword = md5($password);
        $stmt->execute([$email, $hashedPassword]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Lấy thêm thông tin customer nếu có
            $stmt = $conn->prepare("SELECT * FROM customers WHERE id_user = ?");
            $stmt->execute([$user['id_user']]);
            $customer = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($customer) {
                $user['customer_info'] = $customer;
                $user['full_name'] = $customer['full_name'];
            }
        }

        return $user;
    } catch (PDOException $e) {
        return false;
    }
}

function checkEmailExists($email)
{
    try {
        $conn = connDBAss();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        return false;
    }
}

function registerUser($fullname, $email, $password)
{
    try {
        $conn = connDBAss();
        $conn->beginTransaction();

        // Thêm user mới
        $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 0)");
        $hashedPassword = md5($password);
        $stmt->execute([$email, $hashedPassword]);

        $userId = $conn->lastInsertId();

        // Thêm thông tin customer
        $stmt = $conn->prepare("INSERT INTO customers (id_user, full_name, phone, address) VALUES (?, ?, '', '')");
        $stmt->execute([$userId, $fullname]);

        $conn->commit();
        return true;
    } catch (PDOException $e) {
        if ($conn) {
            $conn->rollBack();
        }
        return false;
    }
}

function updateUserProfile($userId, $fullname, $phone, $address)
{
    try {
        $conn = connDBAss();
        $stmt = $conn->prepare("UPDATE customers SET full_name = ?, phone = ?, address = ? WHERE id_user = ?");
        return $stmt->execute([$fullname, $phone, $address, $userId]);
    } catch (PDOException $e) {
        return false;
    }
}

function getUserById($userId)
{
    try {
        $conn = connDBAss();
        $stmt = $conn->prepare("
            SELECT u.*, c.* 
            FROM users u 
            LEFT JOIN customers c ON u.id_user = c.id_user 
            WHERE u.id_user = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}
