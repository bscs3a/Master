<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

    <!-- Start: Edit content -->
    <div class="flex flex-row flex-wrap justify-start m-3">

        <div class="flex-1 p-4 mt-5 w-96 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <img id="image-preview" src="" alt="Image Preview" style="display: none;">
            <input type="file" accept="image/*" id="photo-upload" onchange="previewImage(event)">
        </div>

        <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                 var output = document.getElementById('image-preview');
                 output.src = reader.result;
                 output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>

        <div class="flex-1 p-4 w-96">
            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Display Name</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Product Details</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-6 ml-3">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900">Product Price</label>
                <input type="text" id="large-input" class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
    </div>
    <!-- End: Edit content -->

    <!-- Start: Brand Variations -->
    <div class="text-2xl font-semibold px-6 pt-3 pb-3 ml-3 mt-5">
        <h1>Available Brand Variations</h1>
    </div>

    <div class="flex flex-row flex-wrap justify-evenly">
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 1</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 2</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 3</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 4</div>
        <div class="flex-1 w-64 p-4 mb-6 shadow-md rounded-lg border border-gray-500 bg-white">Item 5</div>
        <div class="flex-1 w-64 py-3 mb-6 text-5xl text-primary"><i class="ri-add-circle-fill"></i></div>
    </div>
    <!-- End: Brand Variations -->

    <!-- Start: Buttons -->
    <div class="flex flex-row flex-wrap justify-between m-3">

        <div class="flex-1 p-4 mt-5 w-64 rounded-lg bg-white border border-gray-600 flex-col shadow-md">    
            <h1 class= "text-black font-bold mt-2 mb-4">Stocks</h1>

            <div class="flex items-center m-3"> 
                <div class="flex flex-col justify-between flex-grow">
                    <p class="text-5xl font-semibold text-center mb-4">100</p>
                </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
                 <button class="items-end rounded-lg w-full py-2 bg-primary text-black border">
                     <span class="font-bold">Order</span></button>
            </div>

        </div>

    </div>

    <div class="flex place-content-end mr-3">  
            <div class="flex justify-end px-4 mt-0">
                <div class="flex place-content-end mt-10 mr-2">
                    <button onclick="location.href='/Master/inv/main'" class="items-end rounded-lg w-24 px-2 py-1 border border-black bg-yellow text-black duration-300">
                    Cancel </button>
                </div>
            </div>
            <div class="flex place-content-end mt-10">
                <button onclick="location.href='/Master/inv/" class="items-end rounded-lg w-24 px-2 py-1 border border-black bg-white text-black duration-300">
                Save </button>
            </div>
    </div>

</body>
</html>



