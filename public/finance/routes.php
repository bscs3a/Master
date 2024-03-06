<?php 

$path = './public/finance/views';

Router::handle('GET', '/fin/sample', "$path/fin.sample.php");
Router::handle('GET', '/fin/link', "$path/fin.test-link.php");
Router::handle('GET', '/fin/link2', "$path/fin.test-link2.php");

// Routes for Ledger Page
Router::handle('GET', '/fin/ledger', "$path/fin.ledger.gen.php");
Router::handle('GET', '/fin/ledger/accounts/investors', "$path/fin.ledger.investors.php");
Router::handle('GET', '/fin/ledger/accounts/payable', "$path/fin.ledger.payable.php");


// Route for Dashboard Page
Router::handle(
    'GET',
    '/fin/dashboard',
    "$path/fin.dashboard.php",
);

