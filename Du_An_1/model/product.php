<?php
require_once 'pdo.php';

function get_all_products()
{
    $sql = "SELECT * FROM products ORDER BY id DESC";
    return pdo_query($sql);
}

function get_product_by_id($id)
{
    $sql = "SELECT * FROM products WHERE id = ?";
    return pdo_query_one($sql, $id);
}

function add_product($name, $price, $description, $image, $category_id)
{
    $sql = "INSERT INTO products(name, price, description, image, category_id) VALUES (?, ?, ?, ?, ?)";
    return pdo_execute($sql, $name, $price, $description, $image, $category_id);
}

function update_product($id, $name, $price, $description, $image, $category_id)
{
    $sql = "UPDATE products SET name=?, price=?, description=?, image=?, category_id=? WHERE id=?";
    return pdo_execute($sql, $name, $price, $description, $image, $category_id, $id);
}

function delete_product($id)
{
    $sql = "DELETE FROM products WHERE id=?";
    return pdo_execute($sql, $id);
}