<?php
//database connection
require_once './src/dbconn.php';

$db = Database::getInstance();
$conn = $db->connect();
if ($conn === null) {
    die('Failed to connect to the database.');
}
?>

<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id = $_SESSION['id'];

    $db = Database::getInstance();
    $conn = $db->connect();

    // To Get the details of the delivery order
    $stmt = $conn->prepare("SELECT * FROM deliveryorders WHERE DeliveryOrderID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // To Get the details of the delivery order from other tables
    $stmt = $conn->prepare("
        SELECT deliveryorders.*, customers.FirstName, customers.LastName, customers.Phone, Sales.CustomerID, Sales.TotalAmount, products.Price, products.ProductName
        FROM deliveryorders 
        JOIN saledetails ON deliveryorders.SaleID = saledetails.SaleID 
        JOIN Sales ON deliveryorders.SaleID = Sales.SaleID
        JOIN customers ON Sales.CustomerID = customers.CustomerID
        JOIN products ON saledetails.ProductID = products.ProductID 
        WHERE deliveryorders.DeliveryOrderID = :id
        ");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View-Details</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>
<body>
    <?php include "component/sidebar.php" ?>

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
                    <p class="text-black font-medium">Delivery / Customer History Order Details</p>
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
        <!-- Content here -->
    
        <div class="pr-20 pl-20 pt-5 pb-5">
            <div class="h-auto p4 rounded-2xl shadow-xl" style="background-color: #262261;">
                <div class="flex justify-between items-center">
                    <h1 class="pt-3 pr-4 pl-4 pb-3 text-lg font-bold text-white">Order Details</h1>
                    <button route='/dlv/history' class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-4 rounded-2xl mr-4">
                        Close
                    </button>
                </div>
                
                <div>
                    <table class="w-full" style="background-color: white;">
                        <tbody class="text-sm">
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Current Status</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryStatus']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Sale ID</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['SaleID']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Customer ID</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['CustomerID']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Name</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['FirstName'] . ' ' . $order['LastName']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Address</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryAddress']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Customer Contact Number</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Phone']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Order Date</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['DeliveryDate']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Order Received</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['ReceivedDate']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">TruckID</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['TruckID']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Product ID</td>
                                <td class="border px-4 py-2" style="width: 70%;">#<?php echo $order['ProductID']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Product Name</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['ProductName']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Quantity</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Quantity']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Price</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['Price']; ?></td>
                            </tr>
                            <tr>
                                <td class="border font-bold px-4 py-2" style="width: 30%;">Total</td>
                                <td class="border px-4 py-2" style="width: 70%;"><?php echo $order['TotalAmount']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                                <!--- This for dropdown selection -->
                <div class="flex justify-center items-center ">
                    <div class="relative inline-flex justify-center items-center">
                        <button class="bg-blue-500  text-white font-bold py-2 px-4 my-4 rounded-2xl hover:bg-blue-700 hover:font-bold transition-colors ease-in-out" route='/dlv/history'>
                            Back
                        </button>
                    </div>
                </div>

<!-- JS function for sidebar -->
<script>
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
        document.getElementById('sidebar-menu').classList.toggle('hidden');
        document.getElementById('sidebar-menu').classList.toggle('transform');
        document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
        document.getElementById('mainContent').classList.toggle('md:w-full');
        document.getElementById('mainContent').classList.toggle('md:ml-64');
    });
</script>

    <script  src="./.././../src/route.js"></script>
    <script  src="./.././../src/form.js"></script>
    </body>
</html>