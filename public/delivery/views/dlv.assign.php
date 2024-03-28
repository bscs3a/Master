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
        // Get the TruckID from the query parameters
$truckId = $_SESSION['truckId'] ?? null;

if ($truckId === null) {
    die('No TruckID provided.');
}
?>

<?php
        // Fetch the truck details
$stmt = $conn->prepare("SELECT * FROM trucks WHERE TruckID = :truckId");
$stmt->execute([':truckId' => $truckId]);

$truck = $stmt->fetch(PDO::FETCH_ASSOC);

if ($truck === false) {
    die('No truck found with the provided TruckID.');
}
?>

<?php
        // Display orders from DeliveryOrders table and intersect with Products and Sales tables
$stmt = $conn->prepare("SELECT DeliveryOrders.*, Products.ProductName, Sales.SaleDate FROM DeliveryOrders 
        INNER JOIN Products ON DeliveryOrders.ProductID = Products.ProductID
        INNER JOIN Sales ON DeliveryOrders.SaleID = Sales.SaleID");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Assign</title>
    <link href="/Master/src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <!-- This is for sorting library -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
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
                    <p class="text-black font-medium">Delivery / Truck Assign</p>
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
            <div class="h-auto bg-white rounded-lg shadow-xl border overflow-hidden">
                <!-- header -->
                <div class="h-auto p4 rounded-lg shadow-xl flex justify-between items-center" style="background-color: #262261;">
                    <h1 class="pt-3 pr-4 pl-4 pb-3 text-2xl font-bold text-white">Truck Assign</h1>
                    <button route='/dlv/dashboard' class="bg-blue-500 hover:bg-blue-700 text-xs text-white font-bold py-1 px-4 rounded-2xl mr-4">
                        Close
                    </button>
                </div>
                <!-- content -->
                <!-- You could provide a form here to assign the truck to an order -->
                <div class="m-4 font-bold text-lg flex flex-col space-y-4">
                    <div class="flex justify-start space-x-20">
                        <p>Plate Number: <span class="font-normal text-gray-500"><?php echo $truck['PlateNumber']; ?></span></p>
                        <p>Truck Type: <span class="font-normal text-gray-500"><?php echo $truck['TruckType']; ?></p><br><br>
                    </div>
                    <div class="flex space-x-10">
                        <p>Select:</p>
                        <div class="border border-gray-200 overflow-auto max-h-[20rem] w-full">
                            <table id="myTable" class="w-full mb-4">
                                <thead class="sticky top-0 bg-white z-10">
                                    <tr>
                                        <th class="w-1/8 border px-4 py-2">Order ID</th>
                                        <th class="w-1/8 border px-4 py-2">Sale ID</th>
                                        <th class="w-1/8 border px-4 py-2">Item Name</th>
                                        <th class="w-1/8 border px-4 py-2">Quantity</th>
                                        <th class="w-1/8 border px-4 py-2">Order Date</th>
                                        <th class="w-1/8 border px-4 py-2">Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody class="font-normal text-center">
                                    <?php foreach ($results as $row): ?>        
                                        <tr>
                                            <td class="border px-4 py-2"><input type="checkbox" name="selectRow" class="mr-4">#<?php echo $row['DeliveryOrderID']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['SaleID']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['ProductName']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['Quantity']; ?></td>
                                            <td class="border px-4 py-2"><?php echo date('Y-m-d', strtotime($row['SaleDate'])); ?></td>
                                            <td class="border px-4 py-2"><?php echo $row['DeliveryDate']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>         
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- save -->
                    <div class="flex justify-center items-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl">
                            Go
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
                <!-- function for sorting library  -->
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "paging":   false,
                "info":     false});
        } );
    </script>   
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
    <script src="/master/src/route.js"></script>
    <script src="/master/src/form.js"></script>
</body>

</html>