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
    // Get database instance and connection
    $db = Database::getInstance();
    $conn = $db->connect();

    // Get form data
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
    $totalAmount = $_POST['totalAmount'];

    // Prepare SQL statement to insert customer data
    $stmt = $conn->prepare("INSERT INTO Customers (FirstName, LastName, Address, Phone, Email) VALUES (:firstName, :lastName, :address, :phone, :email)");

    // Bind parameters
    $stmt->bindParam(':firstName', $customerFirstName);
    $stmt->bindParam(':lastName', $customerLastName);
    $stmt->bindParam(':phone', $customerPhone);
    $stmt->bindParam(':email', $customerEmail);

    // Conditionally bind Address
    if ($salePreference == 'delivery') {
        $stmt->bindParam(':address', $address);
    } else {
        $emptyAddress = '';
        $stmt->bindParam(':address', $emptyAddress);
    }

    // Execute the SQL statement
    $stmt->execute();

    // Get the last inserted customer ID
    $customerId = $conn->lastInsertId();

    // Prepare SQL statement to insert sale data
    $stmt = $conn->prepare("INSERT INTO Sales (SaleDate, DeliveryDate, SalePreference, PaymentMode, TotalAmount, EmployeeID, CustomerID, CardNumber, ExpiryDate, CVV) VALUES (:saleDate, :deliveryDate, :salePreference, :paymentMode, :totalAmount, :employeeId, :customerId, :cardNumber, :expiryDate, :cvv)");
    $stmt->bindParam(':saleDate', $saleDate);
    $stmt->bindParam(':deliveryDate', $deliveryDate);
    $stmt->bindParam(':salePreference', $salePreference);
    $stmt->bindParam(':paymentMode', $paymentMode);
    $stmt->bindParam(':totalAmount', $totalAmount); // Bind the total amount from the form data
    $stmt->bindParam(':employeeId', $employeeId); // You need to get this
    $stmt->bindParam(':customerId', $customerId);
    $stmt->bindParam(':cardNumber', $cardNumber);
    $stmt->bindParam(':expiryDate', $expiryDate);
    $stmt->bindParam(':cvv', $cvv);
    $stmt->execute();

    // Get the last inserted sale ID
    $saleId = $conn->lastInsertId();

    // Get the cart data from the form data
    $cartData = $_POST['cartData'];

    // Decode the cart data
    $cart = json_decode($cartData, true);

    // Prepare the SQL statement to insert sale details
    $stmt = $conn->prepare("INSERT INTO SaleDetails (SaleID, ProductID, Quantity, UnitPrice) VALUES (:saleId, :productId, :quantity, :unitPrice)");

    // Bind the SaleID parameter
    $stmt->bindParam(':saleId', $saleId);

    // Loop through the cart and insert each item
    foreach ($cart as $item) {
        // Bind the product ID, quantity, and unit price
        $stmt->bindParam(':productId', $item['id']);
        $stmt->bindParam(':quantity', $item['quantity']);
        $stmt->bindParam(':unitPrice', $item['price']);

        // Execute the SQL statement
        $stmt->execute();
    }

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
