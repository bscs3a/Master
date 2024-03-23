<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request History</title>
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
            <h1 class="text-2xl font-semibold px-5">Product Order / Request History</h1>
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

        <!-- Calender Button -->
        <div class="m-5 flex justify-between items-center">
          <div class="flex flex-col">
              <button class="border border-gray-400 border-b px-6 py-2 bg-gray-300 text-sm placeholder-gray-400 text-black focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                Sort by Date
              </button>
          </div>
        </div>

        <nav class="mx-5">
          <ul class="flex items-center justify-between -space-x-px h-8 text-sm">
            <li>
              <a href="#" class="flex items-center justify-center px-3 h-8 font-bold text-lg text-gray-500 dark:text-gray-400"><</a>
            </li>
            <li>
              <a href="#" class="flex items-center justify-center px-3 h-8 font-bold text-2xl text-gray-500 dark:text-gray-400">March 2024</a>
            </li>
            <li>
              <a href="#" class="flex items-center justify-center px-3 h-8 font-bold text-lg text-gray-500 dark:text-gray-400">></a>
            </li>
          </ul>
        </nav>

        <!-- table -->
        <div
          class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
          <table
            class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-200">
              <tr class="border-b border-y-gray-300">
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Product
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Request ID
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Date
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Price
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-center text-gray-900">
                  Quantity
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-center text-gray-900">
                  Total
                </th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-b border-gray-300">
              <tr class="hover:bg-gray-100">
                <th class="flex gap-3 px-6 py-7 font-normal text-gray-900">
                  <div class="flex flex-col font-medium text-gray-700 text-sm">
                    <a>Stanley 84-073 Flat</a>
                    <a>Nose Pliers 6"</a>
                  </div>
                </th>
                <td class="px-6 py-7">
                  <div class="font-medium text-gray-700 text-sm">17703</div>
                </td>
                <td class="px-6 py-7">
                  <div class="font-medium text-gray-700 text-sm">...</div>
                </td>
                <td class="px-6 py-7">
                  <div class="font-medium text-gray-700 text-sm">
                    Php 1000
                  </div>
                </td>
                <td class="px-6 py-7">
                  <div class="flex justify-center font-medium text-gray-700 text-sm">
                    <nav>
                      <ul class="flex items-center -space-x-px h-8 text-sm">
                        <li>
                          <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-violet-950 hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">-</a>
                        </li>
                        <li>
                          <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-violet-950 hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                          <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-violet-950 hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">+</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </td>
                <td class="px-6 py-7">
                  <div class="font-medium text-center text-gray-700 text-sm">
                    Php 2000
                  </div>
                </td>
              </tr>
            </tbody>

            <tfoot class="bg-gray-200">
              <tr class="border-b border-y-gray-300">
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                </th>
                <th scope="col" class="px-6 py-4 ml-3 font-medium text-gray-900">
                  <div class="flex flex-col font-medium text-gray-700 gap-3">
                    <a>Items Subtotal: 2</a>
                    <a>Total Amount: Php 2000</a>
                  </div>
                </th>
              </tr>
            </tfoot>

          </table>
        </div>

        <!-- View All Button -->
        <div class="flex justify-end border-none">
          <button class="mr-5 py-3 px-4 border-2 border-black text-sm rounded-md bg-[#FFC955]">
            view all
          </button>
        </div>
        
      </div>
    </div>
  </body>
  <script  src="./../src/route.js"></script>
</html>