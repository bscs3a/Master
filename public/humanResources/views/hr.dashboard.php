<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Dashboard</title>
</head>
<body class="text-gray-800 font-sans">
  <!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#262261] p-4 z-50 sidebar-menu transition-transform">
  <a href="#" class="flex items-center pb-4 border-b border-b-white ">
    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
    <span class="text-xl font-bold text-white ml-28">BSCS 3A</span>
</a>  
<!-- Dashboard -->
<ul class="mt-4">
  <li class="mb-1 group active">
    <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
      <i class="ri-dashboard-3-line mr-3 text-lg"></i>
      <span class="text-sm">Dashboard</span>
    </a>
  </li>
<!-- Product Order -->
  <li class="mb-1 group">
    <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
      <i class="ri-shopping-cart-line mr-3 text-lg"></i>
      <span class="text-sm">Product Order</span>
      <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
    </a>
<!-- View Order -->
<ul class="pl-7 mt-2 hidden group-[.selected]:block">
  <li class="mb-4">
    <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">View Order
      <i class="ri-arrow-right-s-line ml-20"></i> 
    </a>
  </li>
<!-- Edit Order -->
  <li class="mb-4">
    <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Edit Order
      <i class="ri-arrow-right-s-line ml-[86px]"></i> 
    </a>
  </li>
</ul>
  </li>
<!-- Sales -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-line-chart-line mr-3 text-lg"></i>
    <span class="text-sm">Sales</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Inventory -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-survey-line mr-3 text-lg"></i>
    <span class="text-sm">Inventory</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Delivery -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
    <i class="ri-truck-line mr-3 text-lg"></i>
    <span class="text-sm">Delivery</span>
    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
  </a>
  <ul class="pl-7 mt-2 hidden group-[.selected]:block">
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">To Pay
        <i class="ri-arrow-right-s-line ml-[108px]"></i> 
      </a>
    </li>
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">To Ship
        <i class="ri-arrow-right-s-line ml-[101px]"></i> 
      </a>
    </li>
    <li class="mb-4">
      <a href="#" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">To Receive
        <i class="ri-arrow-right-s-line ml-[81px]"></i> 
      </a>
    </li>
  </ul>
</li>
<!-- Finance -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-hand-coin-line mr-3 text-lg"></i>
    <span class="text-sm">Finance</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Human Resource -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-psychotherapy-line mr-3 text-lg"></i>
    <span class="text-sm">Human Resource</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
<!-- Audit Trail -->
<li class="mb-1 group">
  <a href="#" class="flex items-center py-2 px-4 text-gray-50 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
    <i class="ri-sound-module-line mr-3 text-lg"></i>
    <span class="text-sm">Audit Trail</span>
    <i class="ri-arrow-right-s-line ml-auto"></i>
  </a>
</li>
</ul>
</div>
<!-- end: Sidebar -->
<!-- <script src="./../js/script.js"></script> -->
<script type="module" src="../public/humanResources/js/script.js"></script>

<!-- Start Main Bar -->
<main class="w-[calc(100%-256px)] ml-64 bg-gray-50 min-h-screen">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a href="#" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Analytics</a>
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
  <!-- Employee  -->
  <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">Total Employees</div>
      <div class="text-2xl text-center font-semibold">0</div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">On Leave</div>
      <div class="text-2xl text-center font-semibold">0</div>
    </div>        
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">On Board</div>
      <div class="text-2xl text-center font-semibold">0</div>
    </div>
    </div>
  </div>
  <!-- Employees -->
  <h3 class="ml-6 mt-4 text-xl font-bold">Newly Hired Employees</h3>
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
                    src="https://pbs.twimg.com/profile_images/1679743561200463872/2XNOMV6V_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Mysta Rias
                  </div>
                  <div class="text-sm leading-5 text-gray-500">mystarias@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10284</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Inventory</div>
              <div class="text-sm leading-5 text-gray-500">Inventory Manager</div>
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
              <span class="text-sm leading-5 text-gray-900">10472</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Accounting</div>
              <div class="text-sm leading-5 text-gray-500">Financial Analyst</div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</main>
<!-- End Main Bar-->
</body>
</html>          
