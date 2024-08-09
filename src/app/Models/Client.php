<?php

namespace App\Models;

use Config\Database;

class Client {
    public function __construct(private Database $pdo) {
        $this->pdo = $pdo;
    }

    public function all() : array {
        return $this->pdo->query(
            "SELECT 
                id,
                name,
                cpf,
                address
            FROM clients 
            where status is true"
        );
    }

    public function find($id) : array {
        $sql = "SELECT 
                    id,
                    name,
                    cpf,
                    address
                FROM clients 
                where id = ? and status is true";
        $params = [$id];
        return $this->pdo->query($sql, $params);
    }

    public function create($data) : void {
        $sql = "INSERT INTO clients (name, cpf, address, status) VALUES (?, ?, ?, true)";
        $params = [$data['name'], $data['cpf'], $data['address']];
        $this->pdo->query($sql, $params);
    }

    public function update($id, $data) : void {
        $sql = "UPDATE clients SET name = ?, cpf = ?, address = ? WHERE id = ?";
        $params = [$data['name'], $data['cpf'], $data['address'], $id];
        $this->pdo->query($sql, $params);
    }

    public function delete($id) : void {
        $sql = "UPDATE clients SET status = false WHERE id = ?";
        $params = [$id];
        $this->pdo->query($sql, $params);
    }
}