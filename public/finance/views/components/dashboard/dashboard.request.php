<!-- Start: Request Section -->
<div class="mt-10  grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Start: Request -->
    <div class="px-5 border-2 border-solid border-gray-300 shadow-lg">
        <!-- Start: Header -->
        <div class="flex justify-between mt-5 ">
            <div>
                <h1 class="font-sans text-xl font-bold">
                    Request
                    <span class="text-white bg-[#F8B721] inline-flex items-center rounded-full px-2 py-1">99+</span>
                </h1>

            </div>
            <div>
                <a href="#" class="text-sm font-sans font-semibold">
                    <i class="ri-more-line text-3xl text-[#F8B721]"></i>
                </a>
            </div>
        </div>
        <!-- End: Header -->
        <!-- Start: Tab -->
        <div class="flex justify-stretch overflow-x-auto hide-scrollbar">
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-[#F8B721] border-b-2 border-[#F8B721] focus:outline-none">All</button>
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-black border-b-2 border-slate-300  hover:text-[#F8B721] hover:border-[#F8B721] focus:outline-none">HR</button>
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-black border-b-2 border-slate-300  hover:text-[#F8B721] hover:border-[#F8B721] focus:outline-none">Sales</button>
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-black border-b-2 border-slate-300  hover:text-[#F8B721] hover:border-[#F8B721] focus:outline-none">PO</button>
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-black border-b-2 border-slate-300  hover:text-[#F8B721] hover:border-[#F8B721] focus:outline-none">Delivery</button>
            <button
                class="flex-grow px-10 py-2 font-xl font-semibold text-black border-b-2 border-slate-300  hover:text-[#F8B721] hover:border-[#F8B721] focus:outline-none">Inventory</button>
        </div>
        <!-- End: Tab -->

        <!-- Start: Table -->
        <div>
            <table class="table-fixed my-5 w-full" id="table_request">
                <tr class="flex justify-between py-5 font-medium text-xl">
                    <td class="mr-4 text-xl">
                        <p class="font-semibold">Sample User</p>
                        <p>HR Dept</p>
                    </td>

                    <td class="mr-4 line-clamp-2">
                        <p>Salary Request</p>
                    </td>

                    <td class="mr-4 line-clamp-2">
                        <p>March 4, 2024</p>
                    </td>
                    <td class="mr-4">
                        <button class="bg-[#F8B721] rounded-lg px-8 py-3 shadow-md shadow-black-300">
                            <p class="text-white text-lg font-bold ">View</p>
                        </button>
                    </td>
                </tr>

            </table>

            <script>
                let table_request = document.getElementById('table_request');

                for (let index = 0; index < 2; index++) {
                    table_request.innerHTML += `
                                <tr class="flex justify-between py-5 font-medium text-xl">
                                <td class="mr-4 text-xl">
                                    <p class="font-semibold">Sample User</p>
                                    <p>HR Dept</p>
                                </td>

                                <td class="mr-4 line-clamp-2">
                                    <p>Salary Request</p>
                                </td>

                                <td class="mr-4 line-clamp-2">
                                    <p>March 4, 2024</p>
                                </td>
                                <td class="mr-4">
                                    <button class="bg-[#F8B721] rounded-lg px-8 py-3 shadow-md shadow-black-300">
                                        <p class="text-white text-lg font-bold ">View</p>
                                    </button>
                                </td>
                            </tr>
                                `;

                }
            </script>
        </div>
        <!-- End: Table -->
    </div>
    <!-- End: Request -->

    <!-- Start: Salary Request -->
    <div class="px-5 border-2 border-solid border-gray-300 shadow-lg flex flex-col">
        <!-- Start: Header -->
        <div class="flex justify-between mt-5 ">
            <div>
                <h1 class="font-sans text-xl font-bold">
                    General Ledger
                    <i class="ri-arrow-down-wide-line mx-3"></i>
                </h1>
            </div>
            <div>
                <a href="#" class="text-sm font-sans font-semibold">
                    <i class="ri-more-line text-3xl text-[#F8B721]"></i>
                </a>
            </div>
        </div>
        <!-- End: Header -->
        <div class="h-full">
            <table class="table-fixed my-5 w-full text-center border-spacing-y-4" id="general_ledger">
                <thead class="text-xl font-semibold">
                    <td>Date</td>
                    <td>Cash</td>
                    <td>Debit</td>
                    <td>Credit</td>
                </thead>
                <tr class="text-md font-medium">
                    <td>March 4, 2024</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>


        <div class="text-center mb-5">
            <button class="border-2 border-[#F8B721] w-full">
                <p class="text-[#F8B721] py-2 px-2 font-bold text-xl"> <i class="ri-add-line"> </i> New Transaction</p>
            </button>
        </div>

        <script>
            let general_ledger = document.getElementById('general_ledger');

            for (let index = 0; index < 9; index++) {
                general_ledger.innerHTML += `
                            <tr class="text-md font-medium">
                                <td>March 4, 2024</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            `;
            }
        </script>
    </div>
    <!-- End: Salary Request -->

</div>
<!-- End: Request Section -->