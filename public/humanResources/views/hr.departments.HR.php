<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="./../../../src/tailwind.css" rel="stylesheet">
  <title>Departments | HR</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
  require_once 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main class="w-[calc(100%-256px)] ml-64 bg-gray-50 min-h-screen">
  <!-- Top Bar -->
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a href="/Master/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Departments</a>
  <!-- test -->
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Human Resources</a>
  <!-- end test -->
   </ul>
   <ul class="ml-auto flex items-center">
  <li class="mr-1">
    <a href="#" class="text-[#151313] hover:text-gray-600 text-sm font-medium">Sample User</a>
  </li>
  <li class="mr-1">
    <button type="button" class="w-8 h-8 rounded justify-center hover:bg-gray-300"><i class="ri-arrow-down-s-line"></i></button> 
  </li>
   </ul>
  </div>
  <!-- End Top Bar -->
<!-- department tabs -->
<div class="mt-4 ml-4 mb-4">
    <div class="hidden sm:block">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                <a onclick="location.href='/Master/hr/employees/departments/product-order'"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Product Order
                </a>
                <a onclick="location.href='/Master/hr/employees/departments/inventory'"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Inventory
                </a>
                <a onclick="location.href='/Master/hr/employees/departments/sales'"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Points of Sale
                </a>
                <a onclick="location.href='/Master/hr/employees/departments/finance'"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Finance
                </a>
                <a onclick="location.href='/Master/hr/employees/departments/delivery'"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Delivery
                </a>
                <a onclick="location.href='/Master/hr/employees/departments/human-resources'"
                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                    aria-current="page">
                    Human Resources
                </a>
            </nav>
        </div>
    </div>
</div>
<!-- end department tabs -->

</main>
<!-- End Main Bar -->
</body>
</html> 