<?php

$path = './public/sales/views';

$sls = [
    '/sls/sample' => "$path/sls.sample.php",
    '/sls/link' => "$path/sls.test-link.php",
    '/sls/Product-Catalog' => "$path/sls.ProductCatalog.php",
    '/sls/Transaction-History' => "$path/sls.TransactionHistory.php",
    '/sls/Transaction-Details' => "$path/sls.TransactionDetails.php",
    '/sls/Dashboard' => "$path/sls.Dashboard.php",
    '/sls/POS' => "$path/sls.POS.php",
    '/sls/POS/Checkout' => "$path/sls.checkout.php",
    '/sls/POS/Receipt' => "$path/sls.Receipt.php",
    '/sls/Audit-Trail' => "$path/sls.AuditTrail.php",
    // ... other routes ...
];

Router::post('/addSales', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $customerFirstName = $_POST['customerFirstName'];
    $customerLastName = $_POST['customerLastName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPhone = $_POST['customerPhone'];
    $address = $_POST['address'];
    $saleDate = date('Y-m-d H:i:s');
    $salePreference = $_POST['SalePreference'];
    $deliveryOption = $_POST['delivery-option'];
    $deliveryDate = $_POST['deliveryDate'];
    $paymentMode = $_POST['payment-mode'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Insert into Customers table
    $stmt = $conn->prepare("INSERT INTO Customers (FirstName, LastName, Address, Phone, Email) VALUES (:firstName, :lastName, :address, :phone, :email)");
    $stmt->bindParam(':firstName', $customerFirstName);
    $stmt->bindParam(':lastName', $customerLastName);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $customerPhone);
    $stmt->bindParam(':email', $customerEmail);
    $stmt->execute();

    $customerId = $conn->lastInsertId();

    // Insert into Sales table
    $stmt = $conn->prepare("INSERT INTO Sales (SaleDate, DeliveryDate, SalePreference, PaymentMode, TotalAmount, EmployeeID, CustomerID, CardNumber, ExpiryDate, CVV) VALUES (:saleDate, :deliveryDate, :salePreference, :paymentMode, :totalAmount, :employeeId, :customerId, :cardNumber, :expiryDate, :cvv)");
    $stmt->bindParam(':saleDate', $saleDate);
    $stmt->bindParam(':deliveryDate', $deliveryDate);
    $stmt->bindParam(':salePreference', $salePreference);
    $stmt->bindParam(':paymentMode', $paymentMode);
    $stmt->bindParam(':totalAmount', $totalAmount); // You need to calculate this
    $stmt->bindParam(':employeeId', $employeeId); // You need to get this
    $stmt->bindParam(':customerId', $customerId);
    $stmt->bindParam(':cardNumber', $cardNumber);
    $stmt->bindParam(':expiryDate', $expiryDate);
    $stmt->bindParam(':cvv', $cvv);
    $stmt->execute();

    $saleId = $conn->lastInsertId();

    // Insert into SaleDetails table
    // You need to do this for each product in the cart
    $stmt = $conn->prepare("INSERT INTO SaleDetails (SaleID, ProductID, Quantity, UnitPrice) VALUES (:saleId, :productId, :quantity, :unitPrice)");
    $stmt->bindParam(':saleId', $saleId);
    $stmt->bindParam(':productId', $productId); // You need to get this
    $stmt->bindParam(':quantity', $quantity); // You need to get this
    $stmt->bindParam(':unitPrice', $unitPrice); // You need to get this
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    // Redirect to the receipt page
    header("Location: $rootFolder/sls/POS/Receipt");
});

Router::post('/remove', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("DELETE FROM name WHERE name = :name");
    $stmt->bindParam(':name', $name);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/fin/test");
});
