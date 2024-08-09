<?php

namespace App\Controllers;

class HomeController
{
    private const BASE_PAGE_PATH = __DIR__ . '/../Views/Home.php';

    public function index()
    {
        $this->reloadPage();
    }

    private function reloadPage(): void
    {
        require_once self::BASE_PAGE_PATH;
    }
}
