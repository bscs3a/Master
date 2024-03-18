<?php

$path = './public/inventory/views';
$basePath = "$path/inv.";

$inv = [
    // Sample (can remove)
    '/inv/sample' => $basePath . "sample.php",
    '/inv/link' => $basePath . "test-link.php",

    // Main
    '/inv/main' => $basePath . "main.php",

    // Edit Product
    '/inv/prod-edit' => $basePath . "prodEdit.php",

    // Product Order (can remove)
    '/inv/product_order' =>  "prod.ord.main.php",
    '/inv/product_shop' =>"prod.ord.shop.php",
    '/inv/product_checkout' =>  "prod.ord.orders.php",
];