<?php

namespace App\Controllers;

use Config\DataBase;
use App\Models\Product;

class ProductController
{
    private Product $model;
    private const BASE_PAGE_PATH = __DIR__ . '/../Views/Product.php';

    public function __construct(DataBase $pdo) {
        $this->model = new Product($pdo);
    }

    public function index(): void {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo "metodo incorreto para a rota";
            die;
        }

        $this->reloadPage();
    }

    public function store(): void {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "metodo incorreto para a rota";
            die;
        }

        $data = [
            'code' => $_POST['code'],
            'description' => $_POST['description'],
            'warranty_period' => $_POST['warranty_period']
        ];
        $this->model->create($data);

        $this->reloadPage();
    }

    public function update(): void {
        $id = $_POST['id'];
        $data = [
            'code' => $_POST['code'],
            'description' => $_POST['description'],
            'warranty_period' => $_POST['warranty_period']
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
        $products = $this->model->all();

        require_once self::BASE_PAGE_PATH;
    }
}
