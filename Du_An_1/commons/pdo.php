<?php
function pdo_execute($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        return $stmt->execute($args);
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=pro1014;charset=utf8";
    $username = 'root';
    $password = ''; // không có mật khẩu

    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_query_one($sql, ...$args)
{
    try {
        $stmt = pdo_get_connection()->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_query($sql, ...$args)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_query_value($sql, ...$args)
{
    $stmt = pdo_query($sql, ...$args);
    return $stmt->fetchColumn();
}
