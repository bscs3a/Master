<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <?php
    require_once './src/dbconn.php';

    // Fetch the sale ID from the URL
    $saleId = $_GET['sale'];

    // Get PDO instance
    $database = Database::getInstance();
    $pdo = $database->connect();

    // Query for sale details
    $sqlSale = "SELECT * FROM Sales WHERE SaleID = ?";
    $stmtSale = $pdo->prepare($sqlSale);
    $stmtSale->execute([$saleId]);
    $sale = $stmtSale->fetch(PDO::FETCH_ASSOC);

    // Query for customer details
    $sqlCustomer = "SELECT * FROM Customers WHERE CustomerID = ?";
    $stmtCustomer = $pdo->prepare($sqlCustomer);
    $stmtCustomer->execute([$sale['CustomerID']]);
    $customer = $stmtCustomer->fetch(PDO::FETCH_ASSOC);

    // Query for sale items
    $sqlItems = "SELECT * FROM SaleDetails INNER JOIN Products ON SaleDetails.ProductID = Products.ProductID WHERE SaleID = ?";
    $stmtItems = $pdo->prepare($sqlItems);
    $stmtItems->execute([$saleId]);
    $items = $stmtItems->fetchAll(PDO::FETCH_ASSOC);
    ?>

</head>

<body class="bg-gray-100">
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Transaction History</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">
                <div class="text-black font-medium">Sample User</div>
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div class="flex flex-col items-start justify-center min-h-screen w-full max-w-4xl mx-auto p-4">
            <h1 class="mb-3 text-xl font-bold text-gray-700">Transaction Details</h1>
            <div class="w-full bg-white rounded-lg overflow-hidden shadow-lg p-4">
                <div class="p-6 rounded">
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Name: <?php echo $customer['FirstName'] . ' ' . $customer['LastName']; ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Phone: <?php echo $customer['Phone']; ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Email: <?php echo $customer['Email']; ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Sale Preferences: <?php echo $sale['SalePreference']; ?></h2>
                </div>
                <hr class="my-4 border-gray-300">
                <h2 class="text-lg font-semibold text-center my-3 text-gray-700">Items</h2>
                <div class="flex justify-center">
                    <div class="grid grid-cols-3 gap-4 mx-auto">
                        <?php foreach ($items as $item) : ?>
                            <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                                <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                    <!-- SVG icon -->
                                </div>
                                <div class="font-bold text-lg text-gray-700"><?php echo $item['ProductName']; ?></div>
                                <div class="font-normal text-sm text-gray-500"><?php echo $item['Category']; ?></div>
                                <div class="mt-6 text-lg font-semibold text-gray-700">Php<?php echo $item['UnitPrice']; ?></div>
                                <div class="text-gray-500 text-sm">Quantity: <?php echo $item['Quantity']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Quantity: <?php echo array_sum(array_column($items, 'Quantity')); ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Subtotal: &#8369;<?php echo array_sum(array_column($items, 'Subtotal')); ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Tax: &#8369;<?php echo array_sum(array_column($items, 'Tax')); ?></h2>
                    <h2 class="mb-2 text-medium font-semibold text-gray-600">Total: &#8369;<?php echo array_sum(array_column($items, 'TotalAmount')); ?></h2>
                </div>
            </div>
        </div>
    </main>
    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
</body>

</html>