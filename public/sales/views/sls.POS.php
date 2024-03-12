<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale (POS)</title>

    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <style>
        .sidebar-open {
            grid-template-columns: 1fr 300px;
        }

        .sidebar-closed {
            grid-template-columns: 1fr;
        }
    </style>

    <?php
    // Database connection
    $host = 'localhost';
    $db   = 'sales';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

    // Query
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);

    // Fetch all products
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Query for categories
    $sql = "SELECT DISTINCT Category FROM products";
    $stmt = $pdo->query($sql);

    // Fetch all categories
    $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
    ?>

    <script src="app.js" defer></script>
</head>

<body x-data="main">
    <?php include "components/sidebar.php" ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <div id="header" class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <button type="button" class="text-lg sidebar-toggle" @click="cartOpen = false; sidebarOpen = !sidebarOpen">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">
                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Point of Sale(POS)</p>
                </li>
            </ul>

            <ul class="ml-auto flex items-center">
                <div class="text-black font-medium">Sample User</div>
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>
        </div>

        <!-- Start: Full Screen Icon -->
        <div class="absolute top-0 right-0">
            <i id="fullscreenIcon" class="fas fa-expand" @click="isFullScreen = !isFullScreen; sidebarOpen = false;" :class="{ 'p-3 text-lg': isFullScreen, 'pt-14 pr-3 text-lg': !isFullScreen }"></i>
        </div>
        <!-- End: Full Screen Icon -->

        <div class="flex justify-between items-center w-full pt-10 pl-10">

            <form class="max-w-lg mb-3 w-2/5 pl-10">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-10">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <?php foreach ($categories as $category) : ?>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100"><?= $category ?></button>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Hardware, Tools, Supplies..." required /> <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const dropdownButton = document.getElementById('dropdown-button');
                    const dropdown = document.getElementById('dropdown');

                    dropdownButton.addEventListener('click', function() {
                        dropdown.classList.toggle('hidden');
                    });

                    document.addEventListener('click', function(event) {
                        const isDropdownButton = event.target.matches('#dropdown-button');
                        const isDropdown = event.target.closest('#dropdown');
                        if (!isDropdownButton && !isDropdown) {
                            dropdown.classList.add('hidden');
                        }
                    });
                });
            </script>

            <div class=" right-0 fixed flex items-center border-2 border-gray-300 rounded-l-md bg-gray-200">
                <div class="flex items-center">
                    <button type="button" @click="if (sidebarOpen) { sidebarOpen = false; cartOpen = !cartOpen; } else { cartOpen = !cartOpen; }" x-show="!cartOpen" class="items-center flex bg-gray-200  py-2 w-full justify-between sidebar-toggle2">
                        <i class="ri-arrow-left-s-line ml-5 mr-5 text-xl"></i>
                        <div class="border-r border-gray-400 h-6"></div>
                        <div class="px-5">
                            <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                            <span>View Cart</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>



        <!-- Cart -->
        <div id="cart" x-show="cartOpen">
            <div class="fixed right-0 top-10 w-96 overflow-auto rounded-l-lg border-2 border-gray-300 bg-white shadow" x-bind:style="isFullScreen ? 'height: 94vh;' : 'height: 88vh;'" :class="{ '': isFullScreen, 'mt-12': !isFullScreen }">
                <!-- Close Sidebar Button -->
                <div @click="sidebarOpen = false; cartOpen = !cartOpen" class="flex items-center py-2 text-black no-underline bg-gray-200 border-b border-gray-300 cursor-pointer">
                    <i class="ri-arrow-right-s-line text-xl ml-5 mr-5"></i>
                    <div class="border-r border-gray-400 h-6"></div>
                    <div class="mx-3">
                        <i class="ri-shopping-cart-2-fill text-xl mr-2"></i>
                        <span>Cart</span>
                    </div>
                </div>
                <!-- Add Order and Delete buttons -->
                <div class="flex justify-between px-3 py-2 ">
                    <button class="py-1 px-4 rounded bg-gray-100 border-2 border-gray-300">
                        <i class="ri-add-circle-fill text-xl"></i> Add Order
                    </button>
                    <button class="py- px-3 rounded bg-gray-100 border-2 border-gray-300">
                        <i class="ri-delete-bin-7-fill text-xl"></i>
                    </button>
                </div>

                <!-- Cart items -->
                <div class="flex justify-between px-3 py-2 overflow-y-auto max-h-80">
                    <table class="w-full text-right p-3">
                        <tbody>
                            <!-- Cart item rows -->
                            <template x-for="(item, index) in cart" :key="index">
                                <tr class="bg-gray-100">
                                    <td class="text-left px-3 py-2 rounded-l-lg" x-text="item.quantity + ' x ' + item.name"></td>
                                    <td class="text-left border-l border-gray-400 pl-2 px-3 py-2" x-text="item.price"></td>
                                    <td class="px-3 py-2 rounded-r-lg">
                                        <i class="ri-close-circle-fill cursor-pointer" @click="removeFromCart(index)"></i>
                                    </td>
                                </tr>
                            </template>
                            <!-- Add more item rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Order details -->
                <div class="absolute bottom-0 w-full">
                    <div class="py-2 px-1 ml-2 border-t">
                        <!-- Order detail rows -->
                        <div class="grid grid-cols-2 gap-4 items-center mb-2 bg-gray-100 p-4 rounded-lg shadow-md">
                            <span class="font-bold text-base">Subtotal:</span>
                            <span class="text-base ml-0" x-text="'$' + cart.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2)"></span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 items-center mb-2 bg-gray-100 p-4 rounded-lg shadow-md">
                            <span class="font-bold text-base">Tax (10%):</span>
                            <span class="text-base" x-text="'$' + (cart.reduce((total, item) => total + (item.price * item.quantity), 0) * 0.1).toFixed(2)"></span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 items-center mb-2 bg-gray-100 p-4 rounded-lg shadow-md">
                            <span class="font-bold text-base">Order Total:</span>
                            <span class="text-base" x-text="'$' + (cart.reduce((total, item) => total + (item.price * item.quantity), 0) * 1.1).toFixed(2)"></span>
                        </div>
                        <!-- Add more order detail rows as needed -->
                    </div>
                    <!-- Hold and Proceed buttons -->
                    <style>
                        .custom-button {
                            background-color: #FFC955;
                            transition: background-color 0.3s ease;
                        }

                        .custom-button:hover {
                            background-color: #FFA500;
                        }
                    </style>
                    <div class="flex justify-between px-5 py-1 mb-1 space-x-4">
                        <button class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                            <i class="ri-pause-line text-lg mr-2"></i>
                            Hold
                        </button>
                        <button class="flex items-center justify-center font-bold py-1 px-4 rounded w-1/2 border border-black shadow custom-button">
                            <i class="ri-shopping-basket-2-fill mr-2"></i>
                            Proceed
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center min-h-screen w-full" :class="{ 'w-full': !cartOpen, 'w-9/12': cartOpen }">
            <?php
            // Assuming $products is an array of arrays where each inner array contains the product details including category
            $categories = array_unique(array_column($products, 'Category')); // Extracting unique categories from products
            ?>
            <?php foreach ($categories as $category) : ?>
                <div class="text-xl font-bold divide-y ml-3 mt-5"><?= $category ?></div> <!-- Display category name -->
                <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                <div id="grid" x-bind:class="cartOpen ? 'grid grid-cols-5 gap-4' : (!cartOpen && sidebarOpen) ? 'grid grid-cols-5 gap-4' : (!cartOpen && !sidebarOpen) ? 'grid grid-cols-6 gap-4' : 'grid grid-cols-5 gap-4'">
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['Category'] === $category) : ?> <!-- Show products only for the current category -->
                            <div class="product-item w-52 h-70 p-6 flex flex-col items-center justify-center border rounded-lg border-solid border-gray-300 shadow-lg" @click="addToCart({ id: <?= $product['ProductID'] ?>, name: '<?= $product['ProductName'] ?>', price: <?= $product['Price'] ?> }); 
                                cartOpen = true;">
                                <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                                    <!-- SVG icon -->
                                </div>
                                <hr class="w-full border-gray-300 my-2"> <!-- Horizontal line -->
                                <div class="font-bold text-lg text-gray-700 text-center"><?= $product['ProductName'] ?></div>
                                <div class="font-normal text-sm text-gray-500"><?= $product['Category'] ?></div>
                                <div class="mt-6 text-lg font-semibold text-gray-700"><?= $product['Price'] ?></div>
                                <div class="text-gray-500 text-sm">Stocks: <?= $product['Quantity'] ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="./../src/route.js"></script>
</body>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('main', () => ({
            sidebarOpen: true,
            cartOpen: false,
            isFullScreen: false,
            cart: [],
            addToCart(product) {
                let item = this.cart.find(i => i.id === product.id);
                if (item) {
                    item.quantity++;
                } else {
                    this.cart.push({
                        ...product,
                        quantity: 1
                    });
                }
            },
            removeFromCart(index) {
                this.cart.splice(index, 1);
            }
        }));
    });
</script>

<script>
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
        document.getElementById('sidebar-menu').classList.toggle('hidden');
        document.getElementById('sidebar-menu').classList.toggle('transform');
        document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
        document.getElementById('mainContent').classList.toggle('md:w-full');
        document.getElementById('mainContent').classList.toggle('md:ml-64');

        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');

        if (sidebarMenu.classList.contains('hidden')) {
            grid.classList.remove('grid-cols-5');
            grid.classList.add('grid-cols-6');
        } else {
            grid.classList.remove('grid-cols-6');
            grid.classList.add('grid-cols-5');
        }
    });

    document.querySelector('.sidebar-toggle2').addEventListener('click', function() {
        var sidebarMenu = document.getElementById('sidebar-menu');
        var grid = document.querySelector('.grid');

        if (!sidebarMenu.classList.contains('hidden')) {
            sidebarMenu.classList.toggle('hidden');
            sidebarMenu.classList.toggle('transform');
            sidebarMenu.classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');

            if (!sidebarMenu.classList.contains('hidden')) {
                grid.classList.remove('grid-cols-6');
                grid.classList.add('grid-cols-5');
            } else {
                grid.classList.remove('grid-cols-5');
                grid.classList.add('grid-cols-6');
            }
        }
    });
</script>

<script>
    document.getElementById('fullscreenIcon').addEventListener('click', function() {
        var header = document.getElementById('header');
        var sidebarMenu = document.getElementById('sidebar-menu');
        var cart = document.getElementById('cart');
        if (header.style.display === 'none') {
            header.style.display = 'flex';
            if (!sidebarMenu.classList.contains('hidden')) {
                sidebarMenu.classList.toggle('hidden');
                sidebarMenu.classList.toggle('transform');
                sidebarMenu.classList.toggle('-translate-x-full');
                document.getElementById('mainContent').classList.toggle('md:w-full');
                document.getElementById('mainContent').classList.toggle('md:ml-64');
            }

        } else {
            header.style.display = 'none';
            if (!sidebarMenu.classList.contains('hidden')) {
                sidebarMenu.classList.toggle('hidden');
                sidebarMenu.classList.toggle('transform');
                sidebarMenu.classList.toggle('-translate-x-full');
                document.getElementById('mainContent').classList.toggle('md:w-full');
                document.getElementById('mainContent').classList.toggle('md:ml-64');

            }
        }
    });
</script>

</html>