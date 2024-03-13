<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
</head>

<body>
    <?php include "components/sidebar.php" ?>

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
                    <p class="text-black font-medium">Sales / Point Of Sale(POS) / Checkout</p>
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

        <!-- End: Header -->
        <div class="flex flex-col items-center min-h-screen">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Checkout</h1>
                </div>
                <!-- Checkout form -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <!-- Form for delivery address and date -->
                    <div>
                        <label for="customerName" class="block mb-2">Customer Name:</label>
                        <input type="text" id="customerName" name="customerName" class="w-full p-2 border border-gray-300 rounded mb-4">
                    </div>
                    <div>
                        <label for="customerEmail" class="block mb-2">Customer Email or Phone:</label>
                        <input type="text" id="customerEmail" name="customerEmail" class="w-full p-2 border border-gray-300 rounded mb-4">
                    </div>

                    <!-- Option for delivery or pick-up -->
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">Delivery or Pick-up:</label>
                        <select name="delivery-option" id="delivery-option" class="w-full p-2 border border-gray-300 rounded">
                            <option value="delivery">Delivery</option>
                            <option value="pick-up">Pick-up</option>
                        </select>
                    </div>

                    <div id="delivery-details">


                        <label for="address" class="block mb-2">Delivery Address:</label>
                        <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded mb-4">

                        <label for="date" class="block mb-2">Delivery Date:</label>
                        <input type="date" id="date" name="date" class="w-full p-2 border border-gray-300 rounded mb-4">
                    </div>


                    <!-- Mode of payment -->
                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">Mode of Payment:</label>
                        <select name="payment-mode" id="payment-mode" class="w-full p-2 border border-gray-300 rounded">
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                        </select>
                    </div>

                    <div id="payment-details" style="display: none;">
                        <label for="cardNumber" class="block mb-2">Card Number:</label>
                        <input type="text" id="cardNumber" name="cardNumber" class="w-full p-2 border border-gray-300 rounded mb-4">

                        <label for="expiryDate" class="block mb-2">Expiry Date:</label>
                        <input type="date" id="expiryDate" name="expiryDate" class="w-full p-2 border border-gray-300 rounded mb-4">

                        <label for="cvv" class="block mb-2">CVV:</label>
                        <input type="text" id="cvv" name="cvv" class="w-full p-2 border border-gray-300 rounded mb-4">
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 mt-2">
                    <!-- Order summary -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                        <!-- Replace with dynamic content -->
                        <ul id="order-summary" x-data="{ cart: window.cart }">
                            <!-- Cart item rows -->
                            <template x-for="(item, index) in cart" :key="index">
                                <li x-text="item.quantity + ' x ' + item.name + ': ₱' + item.price * item.quantity"></li>
                            </template>
                        </ul>
                        <h2 class="text-xl font-semibold mb-4 mt-6" x-text="'Total: ₱' + cart.reduce((total, item) => total + item.price * item.quantity, 0)"></h2>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        window.cart = JSON.parse(localStorage.getItem('cart') || '[]');
        // Ensure cart items are properly displayed in the HTML
    });

        window.onload = function() {
            var deliveryOption = document.getElementById('delivery-option');
            var deliveryDetails = document.getElementById('delivery-details');

            deliveryOption.addEventListener('change', function() {
                if (this.value === 'delivery') {
                    deliveryDetails.style.display = 'block';
                } else {
                    deliveryDetails.style.display = 'none';
                }
            });

            var paymentOption = document.getElementById('payment-mode');
            var paymentDetails = document.getElementById('payment-details');

            paymentOption.addEventListener('change', function() {
                if (this.value === 'card') {
                    paymentDetails.style.display = 'block';
                } else {
                    paymentDetails.style.display = 'none';
                }
            });
        };
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
    <script src="./../src/route.js"></script>
</body>

</html>