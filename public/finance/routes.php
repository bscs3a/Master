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
    

    '/' => "C:/xampp/htdocs/Master/index.php",
    
];

Router::post('/fin/test', function () {
    $name = $_POST['name'];
 
    // Validate the input
    if (empty($name)) {
        echo "Name and email are required.";
        return;
    }
    $_SESSION['name'] = $name;
    
    echo "Form submitted successfully. Hello, " . $name . "!";
});






