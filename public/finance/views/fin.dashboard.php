<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>



    <!-- Start: Sidebar -->

    <div class="fixed bg-sidebar left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu transition-transform">

        <div href="#" class="flex items-center pb-4">
            <img src="https://placehold.co/50x50" alt="" class="w-10 h-10 rounded object-cover">

            <span class="text-4xl font-bold ml-3 text-white">BSCS 3A</span>
        </div>

        <ul class="mt-3">

            <li class="mb-1 group active ">
                <a href="#" class="flex items-center py-2 px-4 bg-fuchsia-200 bg-opacity-30 rounded-md text-white ">
                    <i class="ri-speed-up-line mr-3 text-lg  "></i>
                    <span class="text-sm font-medium ">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-file-text-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Invoices</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-menu-search-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Category</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-file-history-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-box-3-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Items</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-bank-card-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Payments</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-funds-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Revenue Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-scales-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Balance Sheet</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-database-2-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Database</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-sidebar text-white">
                    <i class="ri-group-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Users</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
        </ul>

    </div>

    <div class="fixed top-0 left-0 w-full h-full z-40 md:hidden sidebar-overlay"></div>
    <!-- End: Sidebar -->



    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <h1>Hellow</h1>

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Finance</p>
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

        <!-- Start: Dashboard Analytics -->

        <div class="w-full min-h-screen p-6 bg-white">
            <h1>Hellow</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <!-- Start: Dashboard Analytics: Total Items -->

                <div class="bg-white rounded-md border border-gray-100 p-4 shadow-md">

                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">0</div>
                            </div>
                            <div class="text-sm font-medium text-black">Total Items</div>
                        </div>
                    </div>

                </div>

                <!-- End: Dashboard Analytics: Total Items -->

                <!-- Start: Dashboard Analytics: Total Invoice -->

                <div class="bg-white rounded-md border border-gray-100 p-4 shadow-md">

                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">0</div>
                            </div>
                            <div class="text-sm font-medium text-black">Total Invoice</div>
                        </div>
                    </div>

                </div>

                <!-- End: Dashboard Analytics: Total Invoice -->

                <!-- Start: Dashboard Analytics: Total Revenue-->

                <div class="bg-white rounded-md border p-6 shadow-md">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">0</div>
                            </div>
                            <div class="text-sm font-medium text-black">Total Revenue</div>
                        </div>
                    </div>
                </div>

                <!-- End: Dashboard Analytics: Total Revenue -->

                <!-- Start: Dashboard Analytics: Total Expense -->

                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">0</div>
                            <div class="text-sm font-medium text-black">Total Expense</div>
                        </div>
                    </div>
                </div>

                <!-- End: Dashboard Analytics: Total Expense -->

            </div>

            <!-- Start: Sales Value -->

            <div
                class="bg-white border border-gray-100 shadow-md p-6 rounded-md border border-gray-100 p-6 shadow-md  p-6">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium"><i class="ri-line-chart-line mr-3"></i>Sales Value</div>
                </div>
            </div>
        </div>
        <!-- End: Sales Value -->
    </main>

    <!-- End: Dashboard -->

</body>

</html>