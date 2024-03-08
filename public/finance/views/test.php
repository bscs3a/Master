<?php 
$db = Database::getInstance();
$conn = $db->connect();

try {
    $conn->query('SELECT 1');
    echo 'Database connection is working.';
} catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}


