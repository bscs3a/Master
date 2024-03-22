<?php

$path = './public/productOrder/views';
$basePath = "$path/po.";

$po = [
    // Sample Routes
    '/po/dashboard' => $basePath . "dashboard.php",
    '/po/suppliers' => $basePath . "suppliers.php",
    '/po/items' => $basePath . "items.php",
    '/po/addItem' => $basePath . "addItem.php",
    '/po/orderRequest' => $basePath . "orderRequest.php",
    '/po/transactionHistory' => $basePath . "transactionHistory.php",



    '/po/sample' => $basePath . "sample.php",
    '/po/link' => $basePath . "test-link.php",   
];