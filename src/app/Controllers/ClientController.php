<?php

namespace App\Controllers;

use Config\DataBase;
use App\Models\Client;

class ClientController 
{
    private Client $model;
    private const BASE_PAGE_PATH = __DIR__ . '/../Views/Client.php';

    public function __construct(DataBase $pdo) {
        $this->model = new Client($pdo);
    }

    public function index(): void {
        $this->reloadPage();
    }

    public function store(): void {
        $data = [
            'name' => $_POST['name'],
            'cpf' => $_POST['cpf'],
            'address' => $_POST['address']
        ];
        $this->model->create($data);

        $this->reloadPage();
    }

    public function update(): void {
        $id = $_POST['id'];
        $data = [
            'name' => $_POST['name'],
            'cpf' => $_POST['cpf'],
            'address' => $_POST['address']
        ];
        $this->model->update($id, $data);
        $this->reloadPage();
    }

    public function destroy(): void {
        $id = $_GET['delete'];
        $this->model->delete($id);
        $this->reloadPage();
    }

    private function reloadPage(): void
    {
        $clients = $this->model->all();

        require_once self::BASE_PAGE_PATH;
    }
}
