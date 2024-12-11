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
            
            $stmt = $conn->prepare("SELECT * FROM customers WHERE id_user = ?");
            $stmt->execute([$user['id_user']]);
            $customer = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($customer) {
                $user['customer_info'] = $customer;
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

        
        $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 0)");
        $hashedPassword = md5($password);
        $stmt->execute([$email, $hashedPassword]);

        $userId = $conn->lastInsertId();

        
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

function updateUserProfile($userId, $fullname, $phone, $address, $password = null)
{
    try {
        $conn = connDBAss();

        
        $stmt = $conn->prepare("UPDATE customers SET full_name = ?, phone = ?, address = ? WHERE id_user = ?");
        $stmt->execute([$fullname, $phone, $address, $userId]);

        
        if (!empty($password)) {
            $hashedPassword = md5($password);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id_user = ?");
            $stmt->execute([$hashedPassword, $userId]);
        }

        return true;
    } catch (PDOException $e) {
        return false;
    }
}


function getUserProfile($email) {
    try {
        $conn = connDBAss();
        $sql = "SELECT u.email, u.password, c.full_name, c.phone, c.address 
                FROM users u 
                JOIN customers c ON u.id_user = c.id_user 
                WHERE u.email = :email";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

