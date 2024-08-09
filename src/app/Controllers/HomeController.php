<?php

namespace App\Controllers;

class HomeController
{
    private const BASE_PAGE_PATH = __DIR__ . '/../Views/Home.php';

    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo "metodo incorreto para a rota";
            die;
        }

        $this->reloadPage();
    }

    private function reloadPage(): void
    {
        require_once self::BASE_PAGE_PATH;
    }
}
