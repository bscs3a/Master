<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Items</title>
    <link href="./../src/tailwind.css" rel="stylesheet" />
  </head>
  <body>
    <div class="flex h-screen bg-gray-100">
      <!-- sidebar -->
      <?php include "components/po.sidebar.php" ?>
      
      <!-- Navbar -->
      <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Header -->
        <div
          class="flex items-center justify-between h-16 bg-zinc-200 border-b border-gray-200">
          <div class="flex items-center px-4">
            <button
              class="text-gray-500 focus:outline-none focus:text-gray-700">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <h1 class="text-2xl font-semibold px-5">Product Order / Items</h1>
          </div>

          <div class="flex items-center pr-4 text-xl font-semibold">
            Sample User

            <span class="p-3">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </span>
          </div>
        </div>

        <!-- Add Item -->
        <div class="flex h-screen py-3 justify-center items-center">
          <div class="h-full w-1/2 border-2 border-gray-300 rounded-md drop-shadow-lg">
            <div class="flex flex-col my-8 mx-3">
              <div class="flex flex-row items-center">
                <!-- Img Item -->
                <div class="flex flex-col justify-center items-center mx-auto mt-3">
                  <div class="flex size-28 border-2 border-gray-300 rounded-md justify-center items-center">
                    <img src="void" alt="img">
                  </div>
                  <button class="px-2 border-2 rounded-md mt-1">choose file</button>
                </div>

                <!-- Forms for product name and id, suppliers name -->
                <div class="flex flex-col mr-8">
                  <label>Product Name</label>
                  <input class="h-8 w-80 border-2 bg-white mb-3 rounded-md">

                  <label>Product ID</label>
                  <input class="h-8 w-80 border-2 bg-white mb-3 rounded-md">

                  <label>Supplier Name</label>
                  <select class="h-8 w-80 border-2 bg-gray-300 rounded-md">
                    <option></option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                  </select>
                </div>
              </div>

              <!-- Forms for category, weight, price, and description -->
              <div class="flex flex-col justify-center mt-8 px-8">
                  <label>Category</label>
                  <select class="h-8 border-2 bg-gray-300 mb-3 rounded-md">
                    <option></option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                  </select>

                  <label>Weight</label>
                  <input class="h-8 border-2 bg-white mb-3 rounded-md">

                  <label>Price</label>
                  <input class="h-8 border-2 bg-white mb-3 rounded-md">

                  <label>Description</label>
                  <textarea class="h-16 border-2 bg-white px-2 resize-none rounded-md"></textarea>
              </div>

              <div class="flex flex-row justify-end gap-3 px-8 mt-3">
                <button route='/po/items' class="py-2 px-4 border-2 text-lg rounded-md">Back</button>
                <button route='/po/items' class="py-2 px-4 border-2 text-lg rounded-md bg-[#FFC955]">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script  src="./../src/route.js"></script>
</html>