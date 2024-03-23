<!-- Main Content -->
<div class="p-4">
    <div class="m-5 flex justify-between items-center">
        <div class="flex sm:flex-row flex-col">
            <div class="flex flex-row">
                <select
                    class="appearance-none rounded-l-lg border border-gray-400 border-b block pl-8 pr-6 py-2 bg-gray-300 text-sm placeholder-gray-400 text-black focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                    <option value="id">Filter</option>
                    <option value="name">Rank</option>
                    <option value="name">...</option>
                    <option value="name">...</option>
                    <option value="name">...</option>
                    <!-- Add more filter options as needed -->
                </select>
                <input id="searchInput" placeholder="Search Supplier"
                    class="rounded-l rounded-lg sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-gray-300 text-sm placeholder-white text-white focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
        </div>
        <div class="lg:ml-40 ml-10 space-x-8">
            <button class="bg-violet-950 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                <a>add supplier</a>
            </button>
        </div>
    </div>

    <!-- Cards -->
    <?php
    try {
        require_once 'dbconn.php';
        // Query to retrieve supplier information
        $query = "SELECT * FROM suppliers";
        $statement = $conn->prepare($query);
        $statement->execute();
        // Check if there are any results
        if ($statement->rowCount() > 0) {
            // Loop through each row of the result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                // Output HTML code for each supplier
                echo '
                <div class="flex justify-center items-center">
                    <div class="grid grid-cols-3 gap-6 supplier" data-supplier-name="' . $row["Supplier_Name"] . '">
                        <div class="h-72 w-96 border border-gray-400 rounded-lg drop-shadow-md">
                            <div class="flex flex-col gap-2 ml-3 my-8">
                                <a class="text-2xl">Rank 1</a>
                                <div class="flex flex-row">
                                    <a>Company Name:</a>
                                    <a class="ml-3 text-gray-500">' . $row["Supplier_Name"] . '</a>
                                </div>
                                <div class="flex flex-row">
                                    <a>Status:</a>
                                    <a class="ml-3 text-green-600">Active</a>
                                </div>
                            </div>

                            <div class="flex justify-center items-center">
                                <button class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                                    <a>View</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "No suppliers found.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
    ?>

    <!-- //end -->
</div>

<!-- JavaScript for Search Functionality -->
<script>
    function search() {
        var searchValue = document.getElementById("searchInput").value.toLowerCase();
        var suppliers = document.getElementsByClassName("supplier");

        for (var i = 0; i < suppliers.length; i++) {
            var supplier = suppliers[i];
            var supplierName = supplier.getAttribute("data-supplier-name").toLowerCase();
            var displayStyle = supplierName.includes(searchValue) ? "block" : "none";
            supplier.style.display = displayStyle;
        }
    }

    document.getElementById("searchInput").addEventListener("input", search);
</script>