<?php

$path = './public/delivery/views';
$basePath = "$path/dlv.";

$dlv = [
    // Delivery
    '/dlv/dashboard' => $basePath . "dashboard.php",
    '/dlv/list' => $basePath . "delivery-list.php",
    '/dlv/viewdetails' => $basePath . "viewdetails.php",
    '/dlv/history' => $basePath . "history.php",
    '/dlv/req' => $basePath . "expenses-req.php",
    '/dlv/assign' => $basePath . "assign.php",
    
    // For page with ID
    '/dlv/viewdetails/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "viewdetails.php";
    },

    '/dlv/assign/truckId={truckId}' => function($truckId) use ($basePath) {
        $_SESSION['truckId'] = $truckId;
        include $basePath . "assign.php";
    },
    
];