<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\ServiceOrder;
use Config\DataBase;

class ServiceOrderController
{
    private const BASE_PAGE_PATH = __DIR__ . '/../Views/ServiceOrder.php';

    public function __construct(
        DataBase $pdo, 
        private ?ServiceOrder $model = null, 
        private ?Product $productModel = null, 
    ) {
        $this->model = $model ?? new ServiceOrder($pdo);
        $this->productModel = $productModel ?? new Product($pdo);
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
            'number' => $_POST['order_number'],
            'opening_date' => $_POST['opening_date'],
            'consumer_name' => $_POST['consumer_name'],
            'consumer_cpf' => $_POST['consumer_cpf'],
            'product_id' => $_POST['product_id']
        ];
        $this->model->create($data);

        $this->reloadPage();
    }

    public function update(): void {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "metodo incorreto para a rota";
            die;
        }

        $id = $_POST['order_id'];
        $data = [
            'number' => $_POST['order_number'],
            'opening_date' => $_POST['opening_date'],
            'consumer_name' => $_POST['consumer_name'],
            'consumer_cpf' => $_POST['consumer_cpf'],
            'product_id' => $_POST['product_id']
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
        $products = $this->productModel->all();
        $orders = $this->model->all();

        require_once self::BASE_PAGE_PATH;
    }
}
