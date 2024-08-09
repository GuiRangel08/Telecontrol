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
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "metodo incorreto para a rota";
            die;
        }

        $data = [
            'name' => $_POST['name'],
            'cpf' => $_POST['cpf'],
            'address' => $_POST['address']
        ];
        $this->model->create($data);

        $this->reloadPage();
    }

    public function update(): void {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "metodo incorreto para a rota";
            die;
        }

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
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo "metodo incorreto para a rota";
            die;
        }

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
