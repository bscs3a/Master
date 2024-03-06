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


    <!--Start: Product Main-->

    <!--Start: Stats-->
    <div class="text-2xl font-semibold px-6 py-5">
        <h1>Stats</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-evenly m-2 ">
        
        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Running Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">+ 10% more than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Delayed Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">+ 10% more than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Repeated Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
            <p class="text-2xl text-center mb-4">10% less than average</p>
              </div>
        </div>

        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
            <h1 class= "font-bold text-3xl text-black mt-2 mb-4">Cancelled Orders</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-3xl text-center mb-4">0</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <p class="text-2xl text-center mb-4"></p>
              </div>
        </div>
        <div class="flex px-4 w-96 rounded-lg bg-white border border-gray-600 flex-col">
        <h1 class="font-bold text-4xl text-black mt-2 mb-4 text-center">Order Summary</h1>
        <div class="flex items-center m-3"> 
        <div class="flex flex-col justify-between flex-grow">
            <p class="text-4xl text-center mb-4">....</p>
        </div>
    </div>
    </div>
    </div>
    <!--End: Stats-->

    <!--Start: Product-->
    <div class="flex justify-between items-center mt-4">
    <div class="text-2xl font-semibold px-6 pt-3 pb-3">
        <h1>Recent Orders</h1>
    </div>
    <div class="relative">
        <input type="text" id="simple-search" class="py-2 px-4 text-md text-black border border-black rounded-lg w-80" placeholder="Search by ID...">
    </div>
</div>
    <!--End: Product-->

    <!--Start: Table-->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 border border-black">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Order ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Date and Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Buyer
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>   
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td> 
            </tr>
            <tr class="bg:white border-b border-black">
            <th scope="row" class="flex items-center px-6 py-4 font-medium text-black whitespace-nowrap">
            <img src="Image_Path.jpg" alt="Pliers" />
            <div class="flex flex-col p-3">
                <span class="font-bold">Stanley 84-073 Flat Nose Pliers 6"</span>
                <span>Quantity: 2</span>
                <span>Php 1000</span>
            </div>
            </th>
                <td class="font-bold px-6 py-4">
                    1023141
                </td>
                <td class="font-bold px-6 py-4">
                    2/20/34
                </td>
                <td class="font-bold px-6 py-4">
                    Aud...
                </td>      
                <td class="font-bold px-6 py-4">
                    <button class="focus:outline-blue-200 text-blue-600 hover:bg-blue-200 hover:text-white">View</button>
                </td>    
            </tr>
    </table>
    </div>
    <!--End: Table-->
    <div class="flex justify-end px-6 mt-0">
    <div class="flex place-content-end mt-10 mr-2">
        <button onclick="location.href='/Master/inv/'" class="items-end rounded-lg w- px-2 py-1 border border-black bg-yellow text-black duration-300">
        Back </button>
    </div>
    <div class="flex place-content-end mt-10">
        <button onclick="location.href='/Master/inv/Product_Order_Shop'" class="items-end rounded-lg w- px-2 py-1 border border-black bg-white text-black duration-300">
        Shop </button>
    </div>
</div>
    </div>
    </body>
</html>


