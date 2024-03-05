<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management Details</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php
    // Connect to your database here if not already connected
    require_once(__DIR__ . '/../sql/dbdelivery.php');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
?>
<div class="flex h-screen bg-gray-200">
    <div class="flex flex-col w-64">
        <!-- Sidebar Content -->
        <div class="flex flex-col h-full">
            <!-- Logo/Header -->
            <div class="bg-gray-800 text-white p-4">
                <h1 class="text-lg font-bold">Delivery Management</h1>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 bg-gray-700 p-2">
                <ul class="space-y-2">
                    <!-- Delivery Tab -->
                    <li>
                        <button onclick="location.href='/Master/dlv/sample'"
                        class="block px-4 py-2 text-white hover:bg-gray-600">Delivery</button>
                    </li>
                    <li>
                        <button onclick="location.href=#"
                        class="block px-4 py-2 text-white hover:bg-gray-600">Details</button>
                    </li>
                    <!-- Add more tabs here if needed -->
                </ul>
            </nav>
        </div>
    </div>
    <div class="flex-1 flex justify-center items-center">
        <?php
        // Retrieve the order ID from the URL path
        $urlPath = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $urlPath);
        $orderID = end($urlParts);

        if ($orderID) {
            // Query to fetch details of the selected order
            $query = "SELECT * FROM usersdelivery WHERE orderID = $orderID";
            $result = mysqli_query($con, $query);

            if ($result) {
                // Fetch the order details
                $order = mysqli_fetch_assoc($result);
        ?>
        <div class="w-full max-w-4xl">
            <h2 class="p-3 bg-gray-700 text-2xl font-bold mb-4 text-white flex justify-between items-center">
                Order Details
                <a onclick="location.href='/Master/dlv/sample'" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Order ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#<?php echo $order['orderID']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#<?php echo $order['customerID']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer Name</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['customerNAME']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Address</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['address']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer Contact Number</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['contact']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Order Date</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['orderDATE']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Supplier ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#<?php echo $order['supplierID']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Product ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#<?php echo $order['productID']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Quantity</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['quantity']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Price</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $order['price']?></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Total</td>
                            <td class="px-6 py-4 whitespace-nowrap">₱<?php echo $order['total']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
            // Additional details can be displayed as needed
            } else {
                echo "Error fetching order details.";
            }
        } else {
            echo "Order ID not provided.";
        }
        ?>
    </div>
</div>
</body>
</html>
