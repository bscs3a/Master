<?php

$path = './public/humanResources/views';
$basePath = "$path/hr.";

$hr = [
    // Dashboard
    '/hr/dashboard' => $basePath . "dashboard.php",

    // employee profile
    '/hr/employees' => $basePath . "employees.php",
    '/hr/employees/search' => $basePath . "employees.php",
    '/hr/employees/add' => $basePath . "employees.add.php",
    '/hr/employees/update' => $basePath . "employees.update.php",
    '/hr/employees/profile' => $basePath . "employees.profile.php",


    // departments
    '/hr/employees/departments' => $basePath . "departments.php", // 'departments.php
    '/hr/employees/departments/product-order' => $basePath . "departments.PO.php", // 'departments.PO.php
    '/hr/employees/departments/inventory' => $basePath . "departments.inv.php", // 'departments.inv.php
    '/hr/employees/departments/sales' => $basePath . "departments.POS.php", // 'departments.POS.php
    '/hr/employees/departments/finance' => $basePath . "departments.fin.php", // 'departments.fin.php
    '/hr/employees/departments/delivery' => $basePath . "departments.dlv.php", // 'departments.dlv.php
    '/hr/employees/departments/human-resources' => $basePath . "departments.HR.php", // 'departments.HR.php

    '/hr/schedule' => $basePath . "schedule.php",
    '/hr/applicants' => $basePath . "applicants.php",
    '/hr/payroll' => $basePath . "payroll.php",
    '/hr/leave-requests' => $basePath . "leave-requests.php",
    '/hr/dtr' => $basePath . "daily-time-record.php",

    //tests
    '/hr/test' => $basePath . "test-add.php",
    '/hr/test/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "test-add.php";
    },
];

// add employees [NOT YET FINALIZED, NEED TO FIX TAX INFO. IT SHOULDNT BE MANUALLY INPUTTED]
// Function to calculate tax amount based on monthly salary
function calculateTax($monthlysalary) {
    if ($monthlysalary <= 20833) {
        return 0;
    } elseif ($monthlysalary <= 33332) {
        return ($monthlysalary - 20833) * 0.20;
    } elseif ($monthlysalary <= 66666) {
        return 2500 + ($monthlysalary - 33332) * 0.25;
    } elseif ($monthlysalary <= 166666) {
        return 10833.33 + ($monthlysalary - 66666) * 0.30;
    } elseif ($monthlysalary <= 666666) {
        return 40833.33 + ($monthlysalary - 166666) * 0.32;
    } else {
        return 200833.33 + ($monthlysalary - 666666) * 0.35;
    }
}

// Function to calculate SSS contribution
function calculateSSS($monthlysalary) {
    // SSS contribution is 14% of the monthly salary
    return $monthlysalary * 0.14;
}

// Function to calculate Philhealth contribution
function calculatePhilhealth($monthlysalary) {
    if ($monthlysalary <= 10000.00) {
        return 500.00;
    } elseif ($monthlysalary <= 99999.99) {
        return 500.00 + ($monthlysalary - 10000.00) * 0.05;
    } else {
        return 5000.00;
    }
}


// Function to calculate Pag-IBIG fund contribution
function calculatePagibig($monthlysalary) {
    // Pag-IBIG fund contribution is fixed at P200
    return 200;
}

Router::post('/hr/employees/add', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    // BASIC EMPLOYEE INFORMATION
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    $query = "INSERT INTO employees (first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, address, contact_no, email, department, position) VALUES (:firstName, :middleName, :lastName, :dateofbirth, :gender, :nationality, :civilstatus, :address, :contactnumber, :email, :department, :position);";
    $stmt = $conn->prepare($query);

    // if (empty($firstName) || empty($lastName) || empty($dateofbirth) || empty($gender) || empty($nationality) || empty($civilstatus) || empty($address) || empty($contactnumber) || empty($email) || empty($department) || empty($position)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    $stmt->execute([
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':dateofbirth' => $dateofbirth,
        ':gender' => $gender,
        ':nationality' => $nationality,
        ':civilstatus' => $civilstatus,
        ':address' => $address,
        ':contactnumber' => $contactnumber,
        ':email' => $email,
        ':department' => $department,
        ':position' => $position,
    ]);

    $employeeId = $conn->lastInsertId();

    // EMPLOYMENT INFORMATION
    $dateofhire = $_POST['dateofhire'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $query = "INSERT INTO employment_info (employees_id, dateofhire, startdate, enddate) VALUES (:employeeId, :dateofhire, :startdate, :enddate);";
    $stmt = $conn->prepare($query);

    // if (empty($dateofhire) || empty($startdate) || empty($enddate)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    $stmt->execute([
        ':employeeId' => $employeeId,
        ':dateofhire' => $dateofhire,
        ':startdate' => $startdate,
        ':enddate' => $enddate,
    ]);

    // SALARY AND TAX INFORMATION
    // salary
    $monthlysalary = $_POST['monthlysalary'];
    $totalsalary = $_POST['totalsalary'];
    
    // Calculate total deductions
    $totalDeductions = calculatePagibig($monthlysalary) + calculateSSS($monthlysalary) + calculatePhilhealth($monthlysalary) + calculatePagibig($monthlysalary);

    // Calculate total salary
    $totalSalary = $monthlysalary - $totalDeductions;

    $query = "INSERT INTO salary_info (employees_id, monthly_salary, total_salary) VALUES (:employeeId, :monthlysalary, :totalsalary);";
    $stmt = $conn->prepare($query);

    // if (empty($monthlysalary) || empty($totalsalary)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    $stmt->execute([
        ':employeeId' => $employeeId,
        ':monthlysalary' => $monthlysalary,
        ':totalsalary' => $totalSalary,
    ]);

    // tax
    $incometax = $_POST['incometax'];
    $withholdingtax = $_POST['withholdingtax'];

    // Calculate tax amount based on monthly salary
    $taxAmount = calculateTax($monthlysalary);

    $query = "INSERT INTO tax_info (employees_id, income_tax, withholding_tax) VALUES (:employeeId, :incometax, :withholdingtax);";
    $stmt = $conn->prepare($query);

    // if (empty($incometax) || empty($withholdingtax)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    $stmt->execute([
        ':employeeId' => $employeeId,
        ':incometax' => $incometax,
        ':withholdingtax' => $taxAmount,
    ]);
    
    // benefits
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $thirteenthmonth = $_POST['thirteenthmonth'];

    // Calculate SSS contribution
    $sssContribution = calculateSSS($monthlysalary);

    // Calculate Philhealth contribution based on monthly salary
    $philhealthContribution = calculatePhilhealth($monthlysalary);

    // Calculate Pag-IBIG fund contribution based on monthly salary
    $pagibigContribution = calculatePagibig($monthlysalary);

    // Calculate total basic salary earned by the employee within the calendar year
    $totalBasicSalary = $monthlysalary * 12;

    // Calculate the minimum value for the 13th-month pay
    $minimumThirteenthMonthPay = $totalBasicSalary / 12;

    // Ensure that the 13th-month pay is not less than the minimum value
    $thirteenthmonth = max($minimumThirteenthMonthPay, $monthlysalary);

    $query = "INSERT INTO benefit_info (employees_id, sss_fund, pagibig_fund, philhealth, thirteenth_month) VALUES (:employeeId, :sss, :pagibig, :philhealth, :thirteenthmonth);";
    $stmt = $conn->prepare($query);

    // if (empty($sss) || empty($pagibig) || empty($philhealth) || empty($thirteenthmonth)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    $stmt->execute([
        ':employeeId' => $employeeId,
        ':sss' => $sssContribution,
        ':pagibig' => $pagibigContribution,
        ':philhealth' => $philhealthContribution,
        ':thirteenthmonth' => $thirteenthmonth,
    ]);

    // ACCOUNT INFORMATION
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['department'];

    $query = "INSERT INTO account_info (employees_id, username, password, role) VALUES (:employeeId, :username, :password, :role);";
    $stmt = $conn->prepare($query);

    // if (empty($username) || empty($password) || empty($role)) {
    //     header("Location: $rootFolder/hr/employees/add");
    //     return;
    // }

    // $stmt->execute([
    //     ':employeeId' => $employeeId,
    //     ':username' => $username,
    //     ':password' => $password,
    //     ':role' => $role,
    // ]);

    header("Location: $rootFolder/hr/employees");
});

// search employees
Router::post('/hr/employees', function () {

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees");
        return;
    }

    include './public/humanResources/views/hr.employees.php';
});

// search employees in DEPARTMENTS : Product Order
Router::post('/hr/employees/departments/product-order', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/product-order");
        return;
    }

    include './public/humanResources/views/hr.departments.PO.php';
});

// search employees in DEPARTMENTS : Inventory
Router::post('/hr/employees/departments/inventory', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/inventory");
        return;
    }

    include './public/humanResources/views/hr.departments.inv.php';
});

// search employees in DEPARTMENTS : Point of Sales
Router::post('/hr/employees/departments/sales', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/sales");
        return;
    }

    include './public/humanResources/views/hr.departments.POS.php';
});

// search employees in DEPARTMENTS : Finance
Router::post('/hr/employees/departments/finance', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/finance");
        return;
    }

    include './public/humanResources/views/hr.departments.fin.php';
});

// search employees in DEPARTMENTS : Delivery
Router::post('/hr/employees/departments/delivery', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/delivery");
        return;
    }

    include './public/humanResources/views/hr.departments.dlv.php';
});

// search employees in DEPARTMENTS : Human Resources
Router::post('/hr/employees/departments/human-resources', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/human-resources");
        return;
    }

    include './public/humanResources/views/hr.departments.HR.php';
});

// search applicants
Router::post('/hr/applicants', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/applicants");
        return;
    }

    $query = "SELECT * FROM applicants WHERE first_name = :search OR last_name = :search OR applyingForPosition = :search OR id = :search;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include './public/humanResources/views/hr.applicants.php';
});

// example [test]
Router::post('/add', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $stmt = $conn->prepare("INSERT INTO test_table (first_name, last_name) VALUES (:firstName, :lastName)");
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($firstName) || empty($lastName)) {
        header("Location: $rootFolder/hr/test");
        return;
    }

    // Execute the statement
    $stmt->execute();

    header("Location: $rootFolder/hr/test");
});

// EXAMPLE DELETE
Router::post('/delete', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $name = $_POST['name'];

    $stmt = $conn->prepare("DELETE FROM name WHERE name = :name");
    $stmt->bindParam(':name', $name);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/hr/test");
});