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

Router::post('/insert', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO name (name) VALUES (:name)");
    $stmt->bindParam(':name', $name);

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($name)) {
        header("Location: $rootFolder/fin/test");
        return;
    }

    // Execute the statement
    $stmt->execute();

    header("Location: $rootFolder/fin/test");
});

Router::post('/delete', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("DELETE FROM name WHERE name = :name");
    $stmt->bindParam(':name', $name);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/test");
});