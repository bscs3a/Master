<?php

// Connect to your database (replace with your own database credentials)
$host = 'localhost';
$dbname = 'sales';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Insert data into the database
$stmt = $pdo->prepare("INSERT INTO your_table_name (customerFirstName, customerLastName, customerEmail) VALUES (:customerFirstName, :customerLastName, :customerEmail)");
$stmt->bindParam(':customerFirstName', $_POST['customerFirstName']);
$stmt->bindParam(':customerLastName', $_POST['customerLastName']);
$stmt->bindParam(':customerEmail', $_POST['customerEmail']);
$stmt->execute();

// Redirect the user to the receipt page
header("Location: receipt.php");
exit();
?>
