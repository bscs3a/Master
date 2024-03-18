<?php
$path = './public/finance/views';

$basePath = "$path/fin.";

$fin = [
    //dashboard
    '/fin/dashboard' => $basePath . "dashboard.php",

    //reports
    '/fin/reportIncome' => $basePath . "reportIncome.php",
    '/fin/reportCash' => $basePath . "reportCash.php",
    '/fin/reportEquity' => $basePath . "reportEquity.php",
    '/fin/reportBalance' => $basePath . "reportBalance.php",

    //ledger
    '/fin/ledger' => $basePath . "ledger.gen.php",
    '/fin/ledger/accounts/investors' => $basePath . "ledger.investors.php",
    '/fin/ledger/accounts/payable' => $basePath . "ledger.payable.php",

    //request
    '/fin/request' => $basePath . "requestInventory.php",
    '/fin/salary' => $basePath . "requestSalary.php",

    '/fin/test' => $basePath . "test.php",

    '/fin/test/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "test2.php";
    },

];

Router::post('/insert', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO name (name) VALUES (:name)");
    $stmt->bindParam(':name', $name);

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty ($name)) {
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





