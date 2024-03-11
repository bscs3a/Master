<?php 
require "./public/finance/routes.php";
require "./public/sales/routes.php";
require "./public/delivery/routes.php";
require "./public/humanResources/routes.php";
require "./public/inventory/routes.php";
require "./public/admin/routes.php";
require "./public/productOrder/routes.php";

$default = [
    '/' => "./src/landing.php",
    '/404' => "./src/error.php",
];

$routes = array_merge($sls, $fin, $inv, $dlv, $hr, $po, $default);

Router::setRoutes($routes);
$currentUri = $_SERVER['REQUEST_URI'];
Router::handle('GET', $currentUri);