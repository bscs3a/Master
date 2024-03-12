<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="./../../../src/tailwind.css" rel="stylesheet">
  <title>Departments | Finance</title>
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
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Finance</a>
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
            <nav class="-mb-px flex flex-wrap gap-6" aria-label="Tabs">
                <a route="/hr/employees/departments/product-order"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Product Order
                </a>
                <a route="/hr/employees/departments/inventory"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Inventory
                </a>
                <a route="/hr/employees/departments/sales"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Points of Sale
                </a>
                <a route="/hr/employees/departments/finance"
                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                    aria-current="page">
                    Finance
                </a>
                <a route="/hr/employees/departments/delivery"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Delivery
                </a>
                <a route="/hr/employees/departments/human-resources"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Human Resources
                </a>
            </nav>
        </div>
    </div>
</div>
<!-- end department tabs -->

  <!-- Employees -->
  <div class="flex flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Employees</h3>
    <form action="/search" method="get" class="mt-6 ml-auto mr-4 flex">
      <input type="search" id="search" name="q" placeholder="Search" class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
  </div> 
  <div class="ml-6 flex flex-col mt-8 mr-6">
  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Name</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            ID</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Department</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Action</th>
        </tr>
      </thead>
        <tbody class="bg-white">
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="https://pbs.twimg.com/profile_images/1766500898807906304/PE7lteVJ_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Luca Kaneshiro
                  </div>
                  <div class="text-sm leading-5 text-gray-500">lucaPOOOOG@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10410</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Accounting</div>
              <div class="text-sm leading-5 text-gray-500">Tax Accountant</div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="https://pbs.twimg.com/profile_images/1649848448689086464/rkJG00b4_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Shu Yamino
                  </div>
                  <div class="text-sm leading-5 text-gray-500">shuyamino@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10502</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Accounting</div>
              <div class="text-sm leading-5 text-gray-500">Financial Analyst</div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="https://pbs.twimg.com/profile_images/1720542381903081472/Fo37UVMt_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Kunai Nakasato
                  </div>
                  <div class="text-sm leading-5 text-gray-500">kunainakasato@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10709</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Accounting</div>
              <div class="text-sm leading-5 text-gray-500">Auditor</div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<!-- End Employees -->
</main>
<!-- End Main Bar -->
    <script  src="./../../../src/route.js"></script>
</body>
</html> 