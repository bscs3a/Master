<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <!-- Include Tailwind CSS -->
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Left Sidebar -->
<div class="flex h-screen bg-gray-200">
    <div class="flex flex-col w-64">
        <!-- Sidebar Content -->
        <div class="flex flex-col h-full">
            <!-- Logo/Header -->
            <div class="bg-gray-800 text-white p-4">
                <h1 class="text-lg font-bold">Delivery Management</h1>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 bg-gray-700 p-2">
                <ul class="space-y-2">
                    <!-- Delivery Tab -->
                    <li>
                        <a href="#" class="block px-4 py-2 text-white hover:bg-gray-600">Delivery</a>
                    </li>
                    <!-- Add more tabs here if needed -->
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
        <!-- Table -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-bold mb-4">Delivery Orders</h2>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border-b border-gray-400 px-4 py-2">Order ID</th>
                        <th class="border-b border-gray-400 px-4 py-2">Order Date</th>
                        <th class="border-b border-gray-400 px-4 py-2">Item</th>
                        <th class="border-b border-gray-400 px-4 py-2">Quantity</th>
                        <th class="border-b border-gray-400 px-4 py-2">Status</th>
                        <th class="border-b border-gray-400 px-4 py-2">Action</th> <!-- New column for details -->
                        <!-- Add more table headers if needed -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows will be dynamically populated here -->
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">3/23/2029</td>
                        <td class="border px-4 py-2">Shovel</td>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2">In transit</td>
                        <td class="border px-4 py-2 flex justify-center"> <!-- Centering the content -->
                            <button onclick="openPopup()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                View Details
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows as per your data -->
                </tbody>
                <tbody>
                    <!-- Table rows will be dynamically populated here -->
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">3/23/2029</td>
                        <td class="border px-4 py-2">Shovel</td>
                        <td class="border px-4 py-2">3</td>
                        <td class="border px-4 py-2">In transit</td>
                        <td class="border px-4 py-2 flex justify-center"> <!-- Centering the content -->
                            <button onclick="openPopup()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                View Details
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows as per your data -->
                </tbody>               
            </table>
        </div>
    </div>
</div>

<!-- Popup for details -->
<div id="popup" class="fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg p-8" style="width: 1000px; height: auto;">
        <!-- Content of your popup -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Details</h2>
            <!-- Container for the button -->
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="closePopup()">Close</button>
        </div>
        <!-- Add your details content here -->
        <table class="w-full">
            <tr>
                <td class="w-1/4 border px-4 py-2">Order ID</td>
                <td class="border px-4 py-2">#00001</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Customer ID</td>
                <td class="border px-4 py-2">#00780</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Customer Name</td>
                <td class="border px-4 py-2">Pedro</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Customer Address</td>
                <td class="border px-4 py-2">Pampanga</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Customer Contact Number</td>
                <td class="border px-4 py-2">09987654321</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Order Date</td>
                <td class="border px-4 py-2">03/01/2030</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Product ID</td>
                <td class="border px-4 py-2">#00300</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Quantity</td>
                <td class="border px-4 py-2">3 pounds</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Price</td>
                <td class="border px-4 py-2">₱100</td> 
            </tr>
            <tr>
                <td class="border px-4 py-2">Total</td>
                <td class="border px-4 py-2">₱300</td> 
            </tr>
        </table>
        <div class="flex justify-center items-center">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Action</button>
            <div class="flex justify-center items-center relative absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" id="dropdown" style="display: none;">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Change Status</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Delete</a>
            </div>
        </div>
    
        <script>
            document.querySelector('.rounded-full').addEventListener('click', function() {
                var dropdown = document.getElementById('dropdown');
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
            });
        </script>
    </div>
</div>



<script>
    function openPopup() {
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script>

</body>
</html>