<?php

$path = './public/productOrder/views';
$basePath = "$path/po.";

$po = [
    // Sample Routes
    '/po/dashboard' => $basePath . "dashboard.php",
    '/po/requestOrder' => $basePath . "requestOrder.php",
    '/po/suppliers' => $basePath . "suppliers.php",
    '/po/items' => $basePath . "items.php",
    '/po/addItem' => $basePath . "addItem.php",
    '/po/orderDetail' => $basePath . "orderDetail.php",
    '/po/transactionHistory' => $basePath . "transactionHistory.php",
    '/po/requestHistory' => $basePath . "requestHistory.php",
    '/po/test' => $basePath . "test.php",
    '/po/updateRequestStatus' => $basePath . "updateRequestStatus.php",



];
//function to add items/product to the database
Router::post('/po/addItem', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // $productID = $_POST['productid']; // for product table
    $productName = $_POST['productname']; // for product table
    $supplierName = $_POST['supplier']; // for supplier table
    $description = $_POST['description']; // for product table
    $category = $_POST['category']; // for product table
    $price = $_POST['price']; // for product table 
    $weight = $_POST['weight']; // for product table

    // Check if all necessary data is provided
    if (empty ($supplierName) || empty ($productName)) {
        // Redirect if any required fields are empty
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/po/items");
        return;
    }

    // Handle image upload
    if (isset ($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];

        // Define the relative path to the "uploads" directory
        $uploadDir = 'uploads/';

        // Ensure the upload directory exists and is writable
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
            // Set appropriate permissions if needed (not recommended for production)
// chmod($uploadDir, 0777);
        }

        // Define the file destination path
        $fileDestination = $uploadDir . $fileName;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // File uploaded successfully, proceed with insertion

            // Insert data into product table
            $stmt1 = $conn->prepare("INSERT INTO products (ProductImage, ProductName, Supplier, Description, Category, Price, ProductWeight) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // $stmt1->bindParam(1, $productID, PDO::PARAM_INT);
            $stmt1->bindParam(1, $fileDestination, PDO::PARAM_STR);
            $stmt1->bindParam(2, $productName, PDO::PARAM_STR);
            $stmt1->bindParam(3, $supplierName, PDO::PARAM_STR);
            $stmt1->bindParam(4, $description, PDO::PARAM_STR);
            $stmt1->bindParam(5, $category, PDO::PARAM_STR);
            $stmt1->bindParam(6, $price, PDO::PARAM_INT);
            $stmt1->bindParam(7, $weight, PDO::PARAM_INT);
            $stmt1->execute();

            // Redirect after successful insertion
            $rootFolder = dirname($_SERVER['PHP_SELF']);
            header("Location: $rootFolder/po/items");
            exit (); // Terminate script execution after redirection
        } else {
            // Failed to move uploaded file
            echo "Failed to move uploaded file.";
            return;
        }
    } else {
        // No file uploaded or an error occurred
        echo "File upload failed.";
        return;
    }
});

//function to delete/remove requested orders of the Inventory Team 
Router::post('/delete/requestOrder', function () {
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Check if the requestID is provided in the POST data
        if (isset ($_POST['requestID'])) {
            $requestID = $_POST['requestID'];

            $stmt = $conn->prepare("DELETE FROM requests WHERE Request_ID = :requestID");
            $stmt->bindParam(':requestID', $requestID);

            // Execute the statement
            $stmt->execute();

            // Check if any rows were affected
            $rowsAffected = $stmt->rowCount();
            if ($rowsAffected > 0) {
                // Redirect back to the request order page after successful deletion
                $rootFolder = dirname($_SERVER['PHP_SELF']);
                header("Location: $rootFolder/po/requestOrder");
                exit (); // Ensure script execution stops after redirection
            } else {
                // No rows were affected, handle this case accordingly
                echo "No rows were deleted.";
            }
        } else {
            // Handle case where requestID is not provided
            echo "No requestID provided for deletion.";
        }
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        echo "Database error: " . $e->getMessage();
    } catch (Exception $e) {
        // Handle any other exceptions
        echo "Error: " . $e->getMessage();
    }
});



// //testing chit
// Router::post('/po/test', function () {
//     $db = Database::getInstance();
//     $conn = $db->connect();

//     $productID = $_POST['productID'];
//     $quantity = $_POST['quantity'];

//     $query = "SELECT Price FROM products WHERE ProductID = :productID";
//         $statement = $conn->prepare($query);
//         $statement->bindParam(':productID', $productID);
//         $statement->execute();
//         $row = $statement->fetch(PDO::FETCH_ASSOC);
//         $price = $row['Price'];

//     $rootFolder = dirname($_SERVER['PHP_SELF']);
//  // Calculate total price
//  $totalPrice = $price * $quantity;

//  // Prepare the SQL statement
//  $query = "INSERT INTO requests (Product_ID, Product_Quantity, Product_Total_Price) VALUES (:productID, :quantity, :totalPrice)";
//  $statement = $conn->prepare($query);

//  // Bind parameters
//  $statement->bindParam(':productID', $productID);
//  $statement->bindParam(':quantity', $quantity);
//  $statement->bindParam(':totalPrice', $totalPrice);

//  // Execute the statement
//  if ($statement->execute()) {
//      echo "Request saved successfully.";
//  } else {
//      echo "Failed to save request.";

//     // Execute the statement


//     header("Location: $rootFolder/test");
// }});




function getProductDetails($productID, $conn)
{
    try {
        // Prepare the SQL statement to fetch product details including the image path
        $query = "SELECT p.ProductImage, p.ProductName, p.Supplier, p.Category, p.Price, r.Product_Quantity, r.Product_Total_Price
                  FROM products p
                  INNER JOIN requests r ON p.ProductID = r.Product_ID
                  WHERE p.ProductID = :product_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':product_id', $productID);
        $statement->execute();

        // Fetch the product details
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if a result is returned
        if ($result) {
            return $result; // Return an associative array containing all product details
        } else {
            return false; // Return false if no result found
        }
    } catch (PDOException $e) {
        // Handle the exception
        echo "Error: " . $e->getMessage();
        return false; // Return false in case of an error
    }
}




function updateRequestStatusToAccepted()
{
    try {
        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement to update the request status
        $stmt = $conn->prepare("UPDATE requests SET request_Status = 'accepted' WHERE request_Status = 'pending'");

        // Execute the statement
        $stmt->execute();
        $rootFolder = dirname($_SERVER['PHP_SELF']);

        // Check if any rows were affected
        $rowsAffected = $stmt->rowCount();
        if ($rowsAffected > 0) {
            echo "Request status updated to 'accepted' for $rowsAffected rows.";
            header("Location: $rootFolder/po/requestOrder");
            exit(); // Stop script execution after redirection
        } else {
            echo "No rows were updated.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Route to handle the update request status action
Router::post('/update/requestOrder', function () {
    // Call the function to update request status
    updateRequestStatusToAccepted();
});