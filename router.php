<?php
require __DIR__ . '/vendor/autoload.php';
require "./web.php";
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

        // Get the base path of the application
        $basePath = dirname($_SERVER['SCRIPT_NAME']);

        // Replace the base path in the current URI
        $currentUri = str_replace($basePath, '', $currentUri);

        // If the current URI is an empty string, set it to "/"
        if ($currentUri === '') {
            $currentUri = '/';
        }

        $validRoutes = self::$validRoutes;

        if (array_key_exists($currentUri, $validRoutes)) {
            require_once $validRoutes[$currentUri];
        } else {
            // The route is not valid
            require_once __DIR__ . "/src/error.php";
        }

        exit();
    }
}

