<?php 

$path = './public/sales/views';

Router::handle('GET', '/sls/sample', "$path/sls.sample.php");
Router::handle('GET', '/sls/link', "$path/sls.test-link.php");

