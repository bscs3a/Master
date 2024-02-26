<?php 

$path = './public/finance/views';

Router::handle('GET', '/fin/sample', "$path/fin.sample.php");
Router::handle('GET', '/fin/link', "$path/fin.test-link.php");

