<?php 

$path = './public/inventory/views';

Router::handle('GET', '/inv/sample', "$path/inv.sample.php");
Router::handle('GET', '/inv/link', "$path/inv.test-link.php");
Router::handle('GET', '/inv/Product_Order_Main', "$path/prod.ord.main.php");
Router::handle('GET', '/inv/Product_Order_Orders', "$path/prod.ord.orders.php");
Router::handle('GET', '/inv/Product_Order_Shop', "$path/prod.ord.shop.php");
