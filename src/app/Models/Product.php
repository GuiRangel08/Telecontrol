<?php

namespace App\Models;

use Config\Database;

class Product {
    public function __construct(private Database $pdo) {
        $this->pdo = $pdo;
    }

    public function all() : array {
        return $this->pdo->query("SELECT * FROM products where status is true");
    }

    public function findAllOrderProducts(): array
    {
        return $this->pdo->query("SELECT * FROM service_order left join products on service_order.product_id = products.id where service_order.status is true");
    }

    public function find($id) : array {
        $sql = "SELECT * FROM products WHERE id = ? and status is true";
        $params = [$id];
        return $this->pdo->query($sql, $params);
    }

    public function create($data) : void {
        $sql = "INSERT INTO products (code, description, warranty_period) VALUES (?, ?, ?)";
        $params = [$data['code'], $data['description'], $data['warranty_period']];
        $this->pdo->query($sql, $params);
    }

    public function update($id, $data) : void {
        $sql = "UPDATE products SET code = ?, description = ?, warranty_period = ? WHERE id = ?";
        $params = [$data['code'], $data['description'], $data['warranty_period'], $id];
        $this->pdo->query($sql, $params);
    }

    public function delete($id) : void {
        $sql = "UPDATE products SET status = false WHERE id = ?";
        $params = [$id];
        $this->pdo->query($sql, $params);
    }
}