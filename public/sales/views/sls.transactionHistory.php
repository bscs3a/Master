<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col items-center min-h-screen">
        <div class="w-full max-w-6xl mt-10">
            <h1 class="mb-3 text-xl font-bold text-black text-left">Transaction History</h1>
            <table class="table-auto w-full mx-auto text-left shadow">
                <thead>
                    <tr class="border-2 bg-gray-100">
                        <th class="px-4 py-2 font-semibold">Name</th>
                        <th class="px-4 py-2 font-semibold">Order ID</th>
                        <th class="px-4 py-2 font-semibold">Address</th>
                        <th class="px-4 py-2 font-semibold">Total Amount</th>
                        <th class="px-4 py-2 font-semibold">Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- You would generate these rows based on your actual data -->
                    <tr onclick="location.href='/Master/sls/transaction-details'" style="cursor: pointer;">
                        <td class="border px-4 py-2">John Doe</td>
                        <td class="border px-4 py-2">123456</td>
                        <td class="border px-4 py-2">123 Main St, Anytown, USA</td>
                        <td class="border px-4 py-2">&#8369;1500.00</td>
                        <td class="border px-4 py-2">Delivered</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button onclick="location.href='/Master/sls/sample'"
            class="px-4 py-2 mt-4 text-white bg-black rounded">Go to Sales</button>
    </div>
</body>

</html>