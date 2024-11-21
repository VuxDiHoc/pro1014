<?php
require_once 'commons/pdo.php';

function checkLogin($email, $password)
{
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    return pdo_query_one($sql, $email, md5($password));
}

function registerUser($fullname, $email, $password)
{
    $sql = "INSERT INTO users (fullname, email, password, created_at) VALUES (?, ?, ?, NOW())";
    return pdo_execute($sql, $fullname, $email, md5($password));
}

function checkEmailExists($email)
{
    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
    return pdo_query_value($sql, $email) > 0;
}

function updateProfile($id, $fullname, $email)
{
    $sql = "UPDATE users SET fullname = ?, email = ? WHERE id = ?";
    return pdo_execute($sql, $fullname, $email, $id);
}

function changePassword($id, $new_password)
{
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    return pdo_execute($sql, md5($new_password), $id);
}
