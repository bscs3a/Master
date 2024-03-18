<?php

$path = './public/admin/views';
$basePath = "$path/adm.";

// <<<<<<< HEAD
// Router::handle('GET', '/adm/dashboard', "$path/adm.dashboard.php");
// Router::handle('GET', '/adm/suppliers', "$path/adm.suppliers.php");
// Router::handle('GET', '/adm/product', "$path/product.php");
// Router::handle('GET', '/adm/login', "$path/adm.login.php");

$routes = [
    // Dashboard
    '/adm/dashboard' => $basePath . "dashboard.php",

    // Edit Employee
    '/adm/edit-employee' => $basePath . "edit-employee.php",

    // Product
    '/adm/product' => $basePath . "product.php",

    // Login
    '/adm/login' => $basePath . "login.php",
];