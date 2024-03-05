<?php

$path = './public/inventory/views';


Router::handle('GET', '/inv/sample', "$path/inv.sample.php");
Router::handle('GET', '/inv/view', "$path/inv.view.php");
Router::handle('GET', '/inv/product&order', "$path/inv.prod_ord.php");

