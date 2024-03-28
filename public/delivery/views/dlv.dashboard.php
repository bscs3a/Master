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
        // Count and display the number of status of every DeliveryOrderID
$stmt = $conn->prepare("SELECT DeliveryStatus, COUNT(DeliveryOrderID) as Count FROM DeliveryOrders GROUP BY DeliveryStatus");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$statusCounts = array('Pending' => 0, 'In Transit' => 0, 'Delivered' => 0);

foreach ($results as $row) {
    $statusCounts[$row['DeliveryStatus']] = $row['Count'];
}
?>

<?php
        // Assuming you have a valid PDO connection in $conn
$stmt = $conn->prepare("SELECT TruckID, PlateNumber, TruckType, TruckStatus FROM trucks");
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
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
                    <p class="text-black font-medium">Delivery / Dashboard</p>
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
        <div class="flex-1 h-full w-full">
            <div class="p-2">
                <div class="h-[200px] flex flex-wrap">
                    <!-- Pending Box -->
                    <div class="flex-1 min-w-0 p-4">
                        <div class="border shadow-xl rounded-lg bg-white h-auto p-3">
                            <h2 class="font-semibold text-lg mb-2 text-black">Pending</h2>
                            <div class="flex items-center justify-between">
                                <img src="../public/delivery/views/img/preparing.png" alt="Pending" style="height: 100px;">
                                <p class="text-black text-2xl font-bold w-[50%] text-right mr-2 "><?php echo $statusCounts['Pending']; ?> Item(s)</p>
                            </div>
                        </div>
                    </div>

                    <!-- In Transit -->
                    <div class="flex-1 min-w-0 p-4">
                        <div class="border shadow-xl rounded-lg bg-white h-auto p-3">
                            <h2 class="font-semibold text-lg mb-2 text-black">In Transit</h2>
                            <div class="flex items-center justify-between">
                                <img src="../public/delivery/views/img/intransit.png" alt="In Transit" style="height: 100px;">
                                <p class="text-black text-2xl font-bold w-[50%] text-right mr-2 "><?php echo $statusCounts['In Transit']; ?> Item(s)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Delivered -->
                    <div class="flex-1 min-w-0 p-4">
                        <div class="border shadow-xl rounded-lg bg-white h-auto p-3">
                            <h2 class="font-semibold text-lg mb-2 text-black">Delivered</h2>
                            <div class="flex items-center justify-between">
                                <img src="../public/delivery/views/img/Delivered.png" alt="In Transit" style="height: 100px;">
                                <p class="text-black text-2xl font-bold w-[50%] text-right mr-2 "><?php echo $statusCounts['Delivered']; ?> Item(s)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>


        <!-- Table -->
        <div class="flex-1 pr-10 pl-10 pb-10 h-full">
            <div class="bg-white p-4 rounded-lg shadow-xl border overflow-hidden">
                <table id="orderTable" class="w-full">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr>
                            <th class="border-b border-gray-400 px-4 py-2">Plate Number</th>
                            <th class="border-b border-gray-400 px-4 py-2">Truck Type</th>
                            <th class="border-b border-gray-400 px-4 py-2">Truck Status</th>
                            <th class="border-b border-gray-400 px-4 py-2" style="pointer-events: none;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                            <!-- detail result -->
                                <td class="border px-4 py-2"><?php echo $row['PlateNumber']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row['TruckType']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row['TruckStatus']; ?></td>
                                <td class="border px-4 py-2 flex justify-center"> 
                                    <?php
                                    $truckStatus = $row['TruckStatus']; // to only accept Available TruckStatus
                                    $truckId = $row['TruckID'];
                                    ?>

                                    <?php if ($truckStatus == 'Available'): ?>
                                        <button class="viewDetailsBtn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-2xl" 
                                                route='/dlv/assign/truckId=<?php echo $truckId; ?>'>
                                            Assign
                                        </button>
                                    <?php elseif ($truckStatus == 'Unavailable'): ?>
                                        <button class="viewDetailsBtn bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-2xl" disabled>
                                            Unavailable
                                        </button>
                                    <?php elseif ($truckStatus == 'In Transit'): ?>
                                        <button class="viewDetailsBtn bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-2xl" disabled>
                                            In Transit
                                        </button>
                                    <?php endif; ?>
                                    <!-- JS function for assigning truck -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>               
                </table>
            </div>
        </div>

    </main> 
            <!-- JS function for sidebar -->
            <script>
                document.querySelectorAll('.viewDetailsBtn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var route = this.getAttribute('route');
                        window.location.href = route;
                    });
                });
                </script>
  <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    <script  src="./../src/route.js"></script>
    <script  src="./../src/form.js"></script>
</body>

</html>