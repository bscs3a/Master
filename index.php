<?php
require_once './router.php';

// Group #1
require_once './public/admin/routes.php';

// Group #2
require_once './public/humanResources/routes.php';

// Group #3
require_once './public/sales/routes.php';

// Group #4
require_once './public/inventory/routes.php';

// Group #5
require_once './public/finance/routes.php';

// Group #6
require_once './public/delivery/routes.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center h-screen">
        <br>
        <button onclick="location.href='./public/admin/views/adm.sample.php'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Admin Page</button><br>
        <button onclick="location.href='/Master/sls/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Sales Page</button><br>
        <button onclick="location.href='/Master/inv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Inventory Page</button><br>
        <button onclick="location.href='/Master/hr/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Human Resources Page</button><br>
        <button onclick="location.href='/Master/fin/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Finance Page</button><br>
        <button onclick="location.href='/Master/dlv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Delivery Page</button><br>
    </div>

</body>

</html>