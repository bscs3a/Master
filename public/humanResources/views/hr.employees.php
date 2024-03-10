<?php
try {
  require_once 'dbconn-test.php';

  $query = "SELECT * FROM employees;";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $stmt = null;
}
catch (PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>List of Employees</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
  include 'inc/sidenav.php';
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
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Employees</a>
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

  <!-- Employees -->
  <h3 class="ml-6 mt-4 text-xl font-bold">All Employees</h3>
  <div class="ml-6 flex flex-col mt-8 mr-6">
  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
    <table class="min-w-full">
      <!-- START HEADER -->
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
      <!-- END HEADER -->
      <?php foreach ($employees as $employee): ?>
        <tbody class="bg-white">
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="<?php echo $employee['image_url']; ?>"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900"><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?>
                  </div>
                  <div class="text-sm leading-5 text-gray-500"><?php echo $employee['email']; ?></div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900"><?php echo $employee['id']; ?></span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900"><?php echo $employee['position']; ?></div>
              <div class="text-sm leading-5 text-gray-500"><?php echo $employee['department']; ?></div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<!-- END Employees -->

  <!-- TEST Employees -->
  <!-- <h3 class="ml-6 mt-4 text-xl font-bold">All Employees</h3>
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
              <span class="text-sm leading-5 text-gray-900">10120</span>
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
                    src="https://pbs.twimg.com/profile_images/1669355498234318849/Kg3mWUFZ_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Ike Eveland
                  </div>
                  <div class="text-sm leading-5 text-gray-500">ikeymikumiku@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10612</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Point of Sale</div>
              <div class="text-sm leading-5 text-gray-500">Business Analyst</div>
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
                    src="https://pbs.twimg.com/profile_images/1721950599900545024/YORUE-T0_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Vox Akuma
                  </div>
                  <div class="text-sm leading-5 text-gray-500">voxakuma@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10425</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Inventory</div>
              <div class="text-sm leading-5 text-gray-500">Purchasing Manager</div>
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
                    src="https://pbs.twimg.com/profile_images/1714840577592754176/_H3V5-uQ_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Uki Violeta
                  </div>
                  <div class="text-sm leading-5 text-gray-500">ukistargazer@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10717</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Human Resources</div>
              <div class="text-sm leading-5 text-gray-500">HR Manager</div>
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
                    src="https://pbs.twimg.com/profile_images/1758239990809595904/GmISpEfo_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Alban Knox
                  </div>
                  <div class="text-sm leading-5 text-gray-500">albanknox@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10526</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Product Order</div>
              <div class="text-sm leading-5 text-gray-500">Procurement Specialist</div>
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
                    src="https://pbs.twimg.com/profile_images/1609173500933337090/OFGa9ue-_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Sonny Brisko
                  </div>
                  <div class="text-sm leading-5 text-gray-500">sonnybrisko@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10406</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Product Order</div>
              <div class="text-sm leading-5 text-gray-500">Quality Control Inspector</div>
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
                    src="https://pbs.twimg.com/profile_images/1749515406451048448/C2dv4EJ3_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Fulgur Ovid
                  </div>
                  <div class="text-sm leading-5 text-gray-500">fuuchan@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10326</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Human Resources</div>
              <div class="text-sm leading-5 text-gray-500">HR Coordinator</div>
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
                    src="https://pbs.twimg.com/profile_images/1755015588332924928/qzjWAFLe_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Vantacrow Bringer
                  </div>
                  <div class="text-sm leading-5 text-gray-500">vanta@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10206</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Delivery</div>
              <div class="text-sm leading-5 text-gray-500">Courier</div>
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
                    src="https://pbs.twimg.com/profile_images/1739918648146534400/KCJLXc0S_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Vezalius Bandage
                  </div>
                  <div class="text-sm leading-5 text-gray-500">zali@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">11117</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Delivery</div>
              <div class="text-sm leading-5 text-gray-500">Delivery Driver</div>
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
                    src="https://pbs.twimg.com/profile_images/1715391269617201152/jIFuPqn9_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Yu Q Wilson
                  </div>
                  <div class="text-sm leading-5 text-gray-500">yuyuwilly@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10904</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Delivery</div>
              <div class="text-sm leading-5 text-gray-500">Parcel Sorter</div>
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
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="https://pbs.twimg.com/profile_images/1727459524808970240/aDMHxOQC_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Victoria Brightshield
                  </div>
                  <div class="text-sm leading-5 text-gray-500">vivibrightshield@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10318</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Inventory</div>
              <div class="text-sm leading-5 text-gray-500">Materials Manager</div>
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
                    src="https://pbs.twimg.com/profile_images/1720500138106585088/8aqYRQ3D_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Claude Clawmark
                  </div>
                  <div class="text-sm leading-5 text-gray-500">claudeclawmark@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">10122</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Points of Sale</div>
              <div class="text-sm leading-5 text-gray-500">Sales Associate</div>
            </td>
            <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> -->
<!-- End TEST Employees -->
</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
</body>
</html> 