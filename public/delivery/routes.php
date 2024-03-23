<?php

$path = './public/delivery/views';
$basePath = "$path/dlv.";

$dlv = [
    // Delivery
    '/dlv/dashboard' => $basePath . "dashboard.php",
    '/dlv/list' => $basePath . "delivery-list.php",
    '/dlv/viewdetails' => $basePath . "viewdetails.php",
    '/dlv/history' => $basePath . "history.php",
    '/dlv/req' => $basePath . "expenses-req.php",
    '/dlv/assign' => $basePath . "assign.php",
    
    // For page with ID
    '/dlv/viewdetails/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "viewdetails.php";
    },

    '/dlv/assign/truckId={truckId}' => function($truckId) use ($basePath) {
        $_SESSION['truckId'] = $truckId;
        include $basePath . "assign.php";
    },
    
];

Router::post('/statusupdateview', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $status = $_POST['status'];
    $orderId = $_POST['orderId'];

    $receivedDate = '0000-00-00';
    if ($status == 'Delivered') {
        $receivedDate = date('Y-m-d');
    }

    // Fetch the TruckID associated with the DeliveryOrderID
    $stmt = $conn->prepare("SELECT TruckID FROM deliveryorders WHERE DeliveryOrderID = :orderId");
    $stmt->bindParam(':orderId', $orderId);
    $stmt->execute();
    $truckId = $stmt->fetchColumn();

    // Update all rows with the fetched TruckID
    $stmt = $conn->prepare("UPDATE deliveryorders SET DeliveryStatus = :status, ReceivedDate = :receivedDate WHERE TruckID = :truckId");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':receivedDate', $receivedDate);
    $stmt->bindParam(':truckId', $truckId);
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/dlv/viewdetails/id=$orderId");
});