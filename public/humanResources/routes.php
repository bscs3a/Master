<?php 

$path = './public/humanResources/views';

Router::handle('GET', '/hr/sample', "$path/hr.sample.php");
Router::handle('GET', '/hr/link', "$path/hr.test-link.php");

