<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col items-start justify-center min-h-screen w-full max-w-4xl mx-auto">
        <h1 class="mb-3 text-xl font-bold text-black">Transaction Details</h1>
        <div class="w-full bg-white shadow rounded">
            <div class="p-6">
                <h2 class="mb-2 text-base font-semibold">Name: John Doe</h2>
                <h2 class="mb-2 text-base font-semibold">Address: 123 Main St, Anytown, USA</h2>
                <h2 class="mb-2 text-base font-semibold">Delivery Status: Delivered</h2>
            </div>
            <hr class="my-2 border-black">
            <h2 class="text-base font-semibold text-center">Items</h2>
            <div class="flex justify-center">
                <div class="grid grid-cols-3 gap-4 mx-auto">
                    <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                        <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                </path>
                            </svg>
                        </div>
                        <div class="font-bold text-base">Nose Pliers</div>
                        <div class="font-normal text-sm">Pliers</div>
                        <div class="mt-6 text-base font-semibold">Php500</div>
                        <div class="text-gray-500 text-sm">Quantity: 1</div>
                    </div>
                    <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                        <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                </path>
                            </svg>
                        </div>
                        <div class="font-bold text-base">Nose Pliers</div>
                        <div class="font-normal text-sm">Pliers</div>
                        <div class="mt-6 text-base font-semibold">Php500</div>
                        <div class="text-gray-500 text-sm">Quantity: 1</div>
                    </div>
                    <div class="w-52 h-70 p-6 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
                        <div class="size-24 rounded-full shadow-md bg-yellow-200 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                </path>
                            </svg>
                        </div>
                        <div class="font-bold text-base">Nose Pliers</div>
                        <div class="font-normal text-sm">Pliers</div>
                        <div class="mt-6 text-base font-semibold">Php500</div>
                        <div class="text-gray-500 text-sm">Quantity: 1</div>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h2 class="mb-2 text-base font-semibold">Quantity: 3</h2>
                <h2 class="mb-2 text-base font-semibold">Total Amount: &#8369;1500.00</h2>
            </div>
        </div>
        <button onclick="window.history.back();" class="px-4 py-2 mt-4 text-white bg-black rounded">Back</button>
    </div>
</body>

</html>