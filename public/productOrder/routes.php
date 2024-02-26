<?php 

$path = './public/productOrder/views';

Router::handle('GET', '/po/sample', "$path/po.sample.php");
Router::handle('GET', '/po/link', "$path/po.test-link.php");

