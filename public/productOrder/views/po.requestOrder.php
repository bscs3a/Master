<?php
// Include your database connection file
require_once 'dbconn.php';

// Function to fetch total product price from the 'requests' table for a specific product
function getTotalProductPrice($productID, $conn) {
  try {
      // Prepare the SQL statement to fetch the total product price for the given product ID
      $query = "SELECT Product_Total_Price 
                FROM requests 
                WHERE Product_ID = :product_id";
      $statement = $conn->prepare($query);
      $statement->bindParam(':product_id', $productID);
      $statement->execute();

      // Fetch the total price
      $result = $statement->fetch(PDO::FETCH_ASSOC);

      // Check if a result is returned
      if ($result) {
          return $result['Product_Total_Price'];
      } else {
          return 0; // Return 0 if no result found
      }
  } catch (PDOException $e) {
      // Handle the exception
      echo "Error: " . $e->getMessage();
      return 0; // Return 0 in case of an error
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Order</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>
<body>
<div class="flex h-screen bg-gray-100">
    <!-- sidebar -->
    <?php include "components/po.sidebar.php" ?>

    <!-- Navbar -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Header -->
        <div class="flex items-center justify-between h-16 bg-zinc-200 border-b border-gray-200">
            <div class="flex items-center px-4">
                <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <h1 class="text-2xl font-semibold px-5">Product Order / Request Order</h1>
            </div>

            <div class="flex items-center pr-4 text-xl font-semibold">
                Sample User

                <span class="p-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                  </svg>
                </span>
            </div>
        </div>

        <!-- table -->
        <div class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-200">
                <tr class="border-b border-y-gray-300">
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Product ID</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Product Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Supplier Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantity</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Total</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 border-b border-gray-300">
                <?php
                try {
                    // Query to retrieve all products
                    $query = "SELECT * FROM products";
                    $statement = $conn->prepare($query);
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                      $productID = $row['ProductID']; // Assigning $productID from the fetched row
                      $totalProductPrice = getTotalProductPrice($productID, $conn);

                      // Your existing code for fetching other product details...
                      $productName = $row['ProductName'];
                      $supplier = $row['Supplier'];
                      $category = $row['Category'];
                      $price = $row['Price'];
                      $imagePath = '../' . $row['ProductImage'];
                  
                      // Fetch
                      echo '<tr class="hover:bg-gray-50">';
                      echo '<td class="px-6 py-10">' . $productID . '</td>';
                      echo '<td class="flex gap-3 px-6 py-10 font-normal text-gray-900">';
                      echo '<div class="font-medium text-gray-700 text-sm flex items-center">';
                      echo '<img src="' . $imagePath . '" alt="Product Image" class="w-8 h-8 mr-2">';
                      echo '<a>' . $productName . '</a>';
                      echo '</div>';
                      echo '</td>';
                      echo '<td class="px-6 py-10">' . $supplier . '</td>';
                      echo '<td class="px-6 py-10">' . $category . '</td>';
                      echo '<td class="px-6 py-10">' . $price . '</td>';
                      echo '<td class="px-6 py-10">';
                      // Input field for quantity selection
                      echo '<input type="number" name="quantity[]" value="1" min="1" class="w-12 text-center">';
                      echo '</td>';
                      // Display total product price here
                      echo '<td class="px-6 py-10">' . $totalProductPrice . '</td>';
                      echo '<td class="px-6 py-10">';
                      echo '<button class="px-4 py-2 border border-red-600 text-red-600 rounded-md font-semibold tracking-wide cursor-pointer">Delete</button>';
                      echo '</td>';
                      echo '</tr>';
                  
                  
                  }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
                </tbody>
                <tfoot class="bg-gray-200">
                <tr class="border-b border-y-gray-300">
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    <th scope="col" class="px-6 py-4 ml-3 font-medium text-gray-900">
                        <div class="flex flex-col font-medium text-gray-700 gap-3">
                            <a>Items Subtotal: 2</a>
                            <a>Total Amount: Php 2000</a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- View All Button -->
        <div class="flex justify-end border-none">
            <button class="mr-5 py-3 px-4 border-2 border-black text-sm rounded-md bg-[#FFC955]">
                view all
            </button>
        </div>
    </div>
    