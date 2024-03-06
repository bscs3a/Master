<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    

</head>

<body>

    <!--Start: Sidebar -->
    <div class="fixed bg-violet-950 left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu">
        
        <div href="#" class="flex items-center pb-4">
        <img src="" alt="sample image" class="w-10 h-10 rounded object-cover">

            <span class="text-4xl font-bold ml-3 text-white">BSCS 3A</span>
        </div>

        <ul class="mt-3">
           
            <li class="mb-1 group active">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-speed-up-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-file-text-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Invoices</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-menu-search-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Category</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-file-history-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Expense Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-box-3-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Items</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-bank-card-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Payments</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-funds-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Revenue Record</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-scales-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Balance Sheet</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 bg-violet-950 text-white">
                    <i class="ri-database-2-line mr-3 text-lg"></i>
                    <span class="text-sm font-medium">Database</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <li class="mb-1 group">
                <a href="#" class="flex hover:bg-purple-950items-center py-2 px-4 bg-violet-950 text-white">
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

    <!-- Start: Header -->

    <div class="py-4 px-7 bg-white flex items-center shadow-md sticky">
    
        <!-- Start: Active Menu -->

        <button type="button" class="text-lg sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>

        <ul class="flex items-center text-md ml-4">

            <li class="mr-2">
                <a class="text-black font-medium">Inventory</a>
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


    <!--Start: Product Order Payment Acceptance/Cancellation-->

    <!--Start: Table-->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 border border-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Each
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg:white border-b border-black">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                <img src="Image_Path.jpg" alt="Pliers" />
                </th>
                <td class="px-6 py-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </td>
                <td class="px-6 py-4">
                    234560329
                </td>
                <td class="px-6 py-4">
                    Tools
                </td>
                <td class="px-6 py-4">
                    99
                </td>
                <td class="px-6 py-4">
                    2
                </td>
                <td class="px-6 py-4">
                    Php500
                </td>          
                <td class="px-6 py-4">
                    Php1000
                </td>      
            </tr>
            <table class="w-full text-xs">
            <table class="w-full text-xs flex flex-col">
        <div class="sticky top-0 bg-gray-200">
            <div class="px-2 py-2">
                Order Subtotal:
            </div>
            <div class="px-2 py-2">
                Shipping:
            </div>
            <div class="px-2 py-2">
                Tax:
            </div>
            <div class="px-2 py-2">
                Order Total:
            </div>
        </div>
    </table>
    </table>
</div>
    <!--End: Table-->
    <div class="flex justify-end px-6 mt-0">
    <div class="flex place-content-end mt-10 mr-2">
        <button onclick="location.href='/Master/inv/Product_Order_Shop'" class="items-end rounded-lg w- px-2 py-1 border border-black bg-yellow text-black duration-300">
        Back </button>
    </div>
    <div class="flex place-content-end mt-10">
        <button class="items-end rounded-lg w- px-2 py-1 border border-black bg-white text-black duration-300">
        Save </button>
    </div>
</div>
</body>
</html>


