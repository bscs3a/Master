<?php 

$path = './public/finance/views';

Router::handle('GET', '/fin/sample', "$path/fin.sample.php");
Router::handle('GET', '/fin/link', "$path/fin.test-link.php");
Router::handle('GET', '/fin/link2', "$path/fin.test-link2.php");

// Route for Dashboard Page
Router::handle(
    'GET',
    '/fin/dashboard',
    "$path/fin.dashboard.php",
);