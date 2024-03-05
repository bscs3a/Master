<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../src/tailwind.css" rel="stylesheet">
    <script src="./tailwind3.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <style>
        .sidebar-open {
            grid-template-columns: 1fr 300px;
        }

        .sidebar-closed {
            grid-template-columns: 1fr;
        }

        .sidebar {
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>
<div class="min-h-screen" x-data="{ sidebarOpen: false, cartOpen: false }" :class="{ 'sidebar-open': sidebarOpen, 'sidebar-closed': !sidebarOpen }">
        <div class="flex justify-between items-center w-full pt-10 pl-10">
            <div class="relative mb-3 flex items-center border-2 border-gray-300 rounded-lg w-2/5 bg-gray-200">
                <div class="flex items-center">
                    <i class="ri-equalizer-line mr-1 ml-5 text-xl"></i>
                    <select class="appearance-none border-r border-gray-300 px-3 py-2 bg-gray-200 text-medium font-semibold">
                        <option value="">
                            Filter
                        </option>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <input type="text" placeholder="Search by Category..." class="px-3 py-2 flex-grow bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-gray-700 h-6 px-3">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-6a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <div class="relative mb-3 flex items-center border-2 border-gray-300 rounded-l-md bg-gray-200" x-show="!sidebarOpen">
                <div class="flex items-center">
                    <button type="button" @click="sidebarOpen = !sidebarOpen; cartOpen = !cartOpen" class="items-center flex bg-gray-200  py-2 w-full justify-between">
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

        <div>

            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 w-full" :class="{ 'w-full': !sidebarOpen, 'w-4/5': sidebarOpen }">
                <div>
                    <div class="text-3xl font-bold divide-y mb-10">Items</div>
                    <div :class="cartOpen ? 'grid grid-cols-4 gap-4' : 'grid grid-cols-6 gap-4'">
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                        <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                            <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                                </svg></div>
                            <div class="font-bold text-xl">Example Name</div>
                            <div class="mt-8 text-xl font-semibold">Php500</div>
                            <div class="text-gray-500">Stocks:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed right-0 top-10 h-screen w-96 overflow-auto sidebar rounded-lg border-2 border-gray-300 bg-white shadow" x-show="sidebarOpen">
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
                <button class=" py-1 px-4 rounded bg-gray-100 border-2 border-gray-300">
                    <i class="ri-add-circle-fill text-xl"></i> Add Order
                </button>
                <button class="py- px-3 rounded bg-gray-100 border-2 border-gray-300">
                    <i class="ri-delete-bin-7-fill text-xl"></i>
                </button>
            </div>

            <!-- Cart items -->
            <div class="flex justify-between px-3 py-2">
                <table class="w-full text-right p-3">
                    <tbody>
                        <tr class="bg-gray-200">
                            <td class="text-left px-3 py-2 rounded-l-lg">2</td>
                            <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Hammer</td>
                            <td class="px-3 py-2">$15.99</td>
                            <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="text-left px-3 py-2 rounded-l-lg">1</td>
                            <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Screwdriver Set</td>
                            <td class="px-3 py-2">$9.99</td>
                            <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="text-left px-3 py-2 rounded-l-lg">3</td>
                            <td class="text-left border-l border-gray-400 pl-2 px-3 py-2">Drill Bits</td>
                            <td class="px-3 py-2">$7.99</td>
                            <td class="px-3 py-2 rounded-r-lg"><i class="ri-close-circle-fill"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="absolute bottom-60 w-full p-3">
                <div class="flex items-center justify-between bg-gray-200 p-3 rounded-lg" style="background-color: #FFEEA5;">
                    <label for="coupon" class="mr-2 font-bold">Add</label>
                    <label for="coupon" class="mr-2 font-bold" style="color: #C91F41;">Discount Coupon</label>
                </div>
            </div>

            <!-- Order details -->
            <div class="absolute bottom-0 w-full bg-gray-200">
                <div class="py-2 px-1 ml-2 border-t border-gray-300">
                    <div class="grid grid-cols-2 items-center mb-2">
                        <span class="text-right pr-16">Order Subtotal:</span>
                        <span class="text-right pr-16">$Subtotal</span>
                    </div>
                    <div class="grid grid-cols-2 items-center mb-2">
                        <span class="text-right pr-16">Shipping:</span>
                        <span class="text-right pr-16">$Shipping</span>
                    </div>
                    <div class="grid grid-cols-2 items-center mb-2">
                        <span class="text-right pr-16">Tax:</span>
                        <span class="text-right pr-16">$Tax</span>
                    </div>
                    <div class="grid grid-cols-2 items-center mb-2 font-bold">
                        <span class="text-right pr-16">Order Total:</span>
                        <span class="text-right pr-16">$Total</span>
                    </div>
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

                <div class="flex justify-between px-5 py-1 mb-12 space-x-4">
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
</body>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>

</html>