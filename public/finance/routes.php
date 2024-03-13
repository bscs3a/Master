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
    

    '/' => "C:/xampp/htdocs/Master/index.php",
    
];






