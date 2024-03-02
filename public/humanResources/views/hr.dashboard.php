<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../src/tailwind.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    
    <div> <!-- content wrapper -->
        <div> <!-- Side Navigation? -->
            <nav>
                <div> <!-- company name -->
                    <h1
                        class="">
                        <a href="#">BSCS 3A</a> 
                    </h1>
                </div> <!-- end of company name -->
                <ul> <!-- either these orrrr straight up departments nalang then when clicked, dun na lilitaw employees for each
                            department -->
                    <li>
                        <a href="hr.employees.php">
                            <span 
                                class="text-blue-500 ">
                                Employees
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="hr.departments.php">
                            <span>Departments</span>
                        </a>
                    </li>
                    <li>
                        <a href="hr.payroll.php">
                            <span>Payroll</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="hr.reports.php">
                            <span>Reports</span>
                        </a>
                    </li> -->
                </ul>
            </nav>
        </div> <!-- end of side navigation -->

        <main class="bg-gray-100">
            <header class="bg-gray-300">
                <div class="pt-6">
                    <h1
                    class="font-bold text-3xl">Human Resources</h1>
                </div>
            </header>

            <div>  <!-- CARDS: numbers of employees -->
                <div>
                    <h2 
                        class="mr-6 text-3xl font-bold">
                        Total Employees
                    </h2>
                    <p
                        class="mr-6 text-3xl">
                        10
                    </p>
                </div>
                <div>
                    <h2
                        class="mr-6 text-3xl font-bold">
                        On Leave
                    </h2>
                    <p
                        class="mr-6 text-3xl">
                        10
                    </p>
                </div>
                <div>
                    <h2
                        class="mr-6 text-3xl font-bold">
                        On Board
                    </h2>
                    <p
                        class="mr-6 text-3xl">
                        10
                    </p>
                </div>
            </div> <!-- end of CARDS: numbers of employees -->
        </main>
        
    </div>

</body>
</html>