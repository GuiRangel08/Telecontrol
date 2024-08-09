<?php
use Config\Database;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'HomeController',
    '/clients' => 'ClientController',
    '/orders' => 'ServiceOrderController',
    '/products' => 'ProductController',
];

function route($uri, $routes) {

    if (!array_key_exists($uri, $routes)) {
        http_response_code(404);
        echo "<div class='alert alert-danger'>Rota inexistente</div>";
        die;
    }

    $controllerClass = 'App\\Controllers\\' . $routes[$uri];
    $controller = new $controllerClass(new Database());

    $action = $_GET['action'] ?? 'index';
    $controller->{$action}();
}

route($uri, $routes);