<?php
require __DIR__ . '/vendor/autoload.php';
require_once "./public/finance/routes.php";
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();

class Router
{
    public static $validRoutes = [];

    public static function setRoutes($routes)
    {
        self::$validRoutes = $routes;
    }

    public static function handle($method = 'GET', $path = '/')
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        if ($currentMethod != $method) {
            return;
        }

        $root = "/Master";
        $currentUri = str_replace($root, '', $currentUri);

        $validRoutes = self::$validRoutes;

        if (array_key_exists($currentUri, $validRoutes)) {
            require_once $validRoutes[$currentUri];
            exit();
        } else {
            // The route is not valid
            require_once './src/error.php';
            exit();
        }
    }
}

