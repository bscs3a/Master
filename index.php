<?php
require_once './router.php';

// Group #1
require_once './public/admin/routes.php';

// Group #2
require_once './public/humanResources/routes.php';

// Group #3
require_once './public/sales/routes.php';

// Group #4
require_once './public/inventory/routes.php';

// Group #5
require_once './public/finance/routes.php';

// Group #6
require_once './public/delivery/routes.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- temp login -->
    <div id="temp-login" class="flex flex-row h-screen w-screen">
      <!-- left panel -->
      <div
        class="flex flex-col h-screen w-1/2 bg-[#262261] justify-center items-center"
      >
        <div class="flex flex-col text-white items-center">
          <p class="text-7xl font-sans font-bold">BSCS 3A</p>
          <p class="text-sm mt-3">A Web Application</p>
          <p class="text-sm">for Hardware Store Mangement</p>
        </div>
      </div>

      <!-- right panel -->
      <div class="flex flex-col h-screen w-1/2 justify-center items-center">
        <p class="text-6xl font-sans font-bold">Login</p>
        <p class="mt-3 text-sm text-gray-400">
          Welcome Back! Please enter your details
        </p>

        <!-- user info form -->
        <form class="mt-3 w-72 mx-auto">
          <div class="mb-5">
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Email</label
            >
            <input
              type="email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="user@gmail.com"
              required
            />
          </div>
          <div class="mb-5">
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Password</label
            >
            <input
              type="password"
              id="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required
            />
          </div>

          <button
            type="submit"
            class="text-white bg-[#262261] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Login
          </button>
        </form>
      </div>
    </div>

    <!-- temp menu -->
    <div id="temp-menu" class="hidden flex flex-col items-center justify-center h-screen">
        <br>
        <button onclick="location.href='./public/admin/views/adm.sample.php'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Admin Page</button><br>
        <button onclick="location.href='/Master/sls/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Sales Page</button><br>
        <button onclick="location.href='/Master/inv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Inventory Page</button><br>
        <button onclick="location.href='/Master/hr/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Human Resources Page</button><br>
        <button onclick="location.href='/Master/fin/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Finance Page</button><br>
        <button onclick="location.href='/Master/dlv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Delivery Page</button><br>
        <button id="temp-logout" class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Log out</button>
    </div>

      <!-- temp script for login func and log out func -->
      <script>
        document.getElementById("temp-login").addEventListener("submit", function (event) {
        event.preventDefault();

        const isValid = true;
    
        if (isValid) {
            // Show the temp menu and hide the temp-login
            document.getElementById("temp-menu").classList.remove("hidden");
            document.getElementById("temp-login").classList.add("hidden");
        };
        });

        document.getElementById("temp-logout").addEventListener("click", function () {
            // Show the temp-login and hide the temp menu
            document.getElementById("temp-login").classList.remove("hidden");
            document.getElementById("temp-menu").classList.add("hidden");
        });
      </script>

</body>

</html>