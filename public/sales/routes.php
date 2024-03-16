<?php 

$path = './public/sales/views';

$sls = [
    '/sls/sample' => "$path/sls.sample.php",
    '/sls/link' => "$path/sls.test-link.php",
    '/sls/Product-Catalog' => "$path/sls.ProductCatalog.php",
    '/sls/Transaction-History' => "$path/sls.TransactionHistory.php",
    '/sls/Transaction-Details' => "$path/sls.TransactionDetails.php",
    '/sls/Dashboard' => "$path/sls.Dashboard.php",
    '/sls/POS' => "$path/sls.POS.php",
    '/sls/POS/Checkout' => "$path/sls.checkout.php",
    '/sls/Receipt' => "$path/sls.Receipt.php",
    '/sls/Audit-Trail' => "$path/sls.AuditTrail.php",
    // ... other routes ...
];

Router::setRoutes([
    '/sls/POS/Checkout' => "$path/sls.checkout.php", // Replace 'path/to/checkout.php' with the actual path to your checkout page
    // Add other routes here
]);


