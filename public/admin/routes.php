<?php 

$path = './public/admin/views';

Router::handle('GET', '/adm/dashboard', "$path/adm.dashboard.php");
Router::handle('GET', '/adm/suppliers', "$path/adm.suppliers.php");
Router::handle('GET', '/adm/product', "$path/product.php");
Router::handle('GET', '/adm/login', "$path/adm.login.php");

