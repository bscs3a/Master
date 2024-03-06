<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>



    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
    
    <!-- End: Sidebar -->



    <!-- Start: Body -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">


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

        <!-- Start Charts -->
        <!-- bar chart -->
        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>

        <!-- line chart -->
        <div style="width: 800px;"><canvas id="lineChart"></canvas></div>
    
        <!-- pie chart -->
        <div style="width: 800px;"><canvas id="pieChart"></canvas></div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="module" src="../public/finance/javascript/charts.js"></script>
        <!-- End Charts -->

</body>

</html>