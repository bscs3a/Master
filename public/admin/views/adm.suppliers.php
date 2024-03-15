<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="./../src/tailwind.css" rel="stylesheet" />
  </head>
  <body>
    <div class="flex h-screen bg-gray-100">
      
    <?php include "components/adm.sidebar.php" ?>

      <!-- Navbar -->
      <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- header -->
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
            <h1 class="text-2xl font-semibold px-5">Product Order / Suppliers</h1>
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

        <!-- Main Content -->
        <div class="p-4">
          <div class="m-5 flex justify-between items-center">
            <div class="flex sm:flex-row flex-col">
              <div class="block relative">
                <span
                  class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                  <svg
                    viewBox="0 0 24 24"
                    class="h-4 w-4 fill-current text-gray-500">
                    <path
                      d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                  </svg>
                </span>
                <input
                  placeholder="Search"
                  class="appearance-none rounded-l rounded-lg sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
              </div>
            </div>
            <div class="lg:ml-40 ml-10 space-x-8">
              <button
                class="bg-yellow-400 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                <a>New Suppliers</a>
              </button>
            </div>
          </div>

          <!-- table -->
          <div
            class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
            <table
              class="w-full border-collapse bg-white text-left text-sm text-gray-500">
              <thead class="bg-gray-200">
                <tr class="border-b border-y-gray-300">
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Rank
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Company Name
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Mobile Phone
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Address
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Feedback
                  </th>

                  <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Status
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-100 border-b border-gray-300">
                <tr class="hover:bg-gray-50">
                  <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                    <div class="font-medium text-gray-700 text-sm">1</div>
                  </th>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">Marc Toolbox</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">09**-***-****</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      Florida
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="font-medium text-gray-700 text-sm">
                      5 starrrr......
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <span
                      class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semiboldtext-green-600">
                      <span
                        class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="w-4 h-4">
                      <path
                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
