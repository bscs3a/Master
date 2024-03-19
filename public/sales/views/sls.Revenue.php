<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        import Swal from 'sweetalert2'

        const Swal = require('sweetalert2')
    </script>


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
                    <p class="text-black font-medium">Sales / Revenue</p>
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

        <div class="flex flex-col items-center min-h-screen mb-10 ">
            <div class="w-full max-w-6xl mt-10">
                <div class="flex justify-between items-center">
                    <h1 class="mb-3 text-xl font-bold text-black">Revenue</h1>
                    <div class="relative mb-3">
                    </div>
                </div>

                <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 font-semibold">Customer Name</th>
                            <th class="px-4 py-2 font-semibold">Sale ID</th>
                            <th class="px-4 py-2 font-semibold">Sale Date</th>
                            <th class="px-4 py-2 font-semibold">Sale Preference</th>
                            <th class="px-4 py-2 font-semibold">Payment Mode</th>
                            <th class="px-4 py-2 font-semibold">Total Amount</th>
                            <th class="px-4 py-2 font-semibold">Action</th>
                        </tr>
                   
                    </thead>
               
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                        <td class="p-4">1</td>
                       
                   
                    <tbody>
                        <!-- Table data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    <script src="./../src/form.js"></script>
    <script src="./../src/route.js"></script>
</body>

</html>