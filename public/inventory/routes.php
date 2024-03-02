<?php

$path = './public/inventory/views';

Router::handle('GET', '/inv/sample', "$path/inv.sample.php");
Router::handle('GET', '/inv/link', "$path/inv.test-link.php");
Router::handle('GET', '/inv/view', "$path/inv.view.php");

