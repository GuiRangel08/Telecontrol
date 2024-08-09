<?php

namespace App\Models;

use Config\Database;

class ServiceOrder {
    public function __construct(private Database $pdo) {
        $this->pdo = $pdo;
    }

    public function all() : array {
        return $this->pdo->query(
            "SELECT 
                so.id,
                so.number,
                so.opening_date,
                so.consumer_name,
                so.consumer_cpf,
                p.id product_id,
                p.description
            FROM 
                service_order so
            left join products p
                on so.product_id = p.id 
            where so.status is true
        ");
    }

    public function find($id) : array {
        $sql = "SELECT * FROM service_order WHERE id = ? and status is true";
        $params = [$id];
        return $this->pdo->query($sql, $params);
    }

    public function create($data) : void {
        $sql = "INSERT INTO service_order (number, opening_date, consumer_name, consumer_cpf, product_id) VALUES (?, ?, ?, ?, ?)";
        $params = [$data['number'], $data['opening_date'], $data['consumer_name'], $data['consumer_cpf'], $data['product_id']];
        $this->pdo->query($sql, $params);
    }

    public function update($id, $data) : void {
        $sql = "UPDATE service_order SET number = ?, opening_date = ?, consumer_name = ?, consumer_cpf = ?, product_id = ? WHERE id = ?";
        $params = [$data['number'], $data['opening_date'], $data['consumer_name'], $data['consumer_cpf'], $data['product_id'], $id];
        $this->pdo->query($sql, $params);
    }

    public function delete($id) : void {
        $sql = "UPDATE service_order SET status = false WHERE id = ?";
        $params = [$id];
        $this->pdo->query($sql, $params);
    }
}