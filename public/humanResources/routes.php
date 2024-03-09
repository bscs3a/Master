<?php

$path = './public/humanResources/views';
$basePath = "$path/hr.";

$hr = [
    // Dashboard
    '/hr/dashboard' => $basePath . "dashboard.php",

    // Edit Employee
    '/hr/employees' => $basePath . "employee-list.php",

    // Add Employee
    '/hr/add' => $basePath . "add-employee.php",
];

Router::handle('GET', '/hr/dashboard', "$path/hr.dashboard.php");

