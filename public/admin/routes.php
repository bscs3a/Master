<?php 

$path = './public/admin/views';

Router::handle('GET', '/adm/sample', "$path/adm.sample.php");
Router::handle('GET', '/adm/link', "$path/adm.test-link.php");
Router::handle('GET', '/adm/link', "$path/itemsCRUD.php");

