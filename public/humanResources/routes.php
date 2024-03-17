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
        $_GET['id'] = $id;
        include $basePath . "test-add.php";
    },
];

// add employees [NOT YET FINALIZED]
Router::post('/add-employees', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    // BASIC EMPLOYEE INFORMATION
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    // SALARY AND TAX INFORMATION
    // salary
    $basesalary = $_POST['basesalary'];
    $totalsalary = $_POST['totalsalary'];
    // tax
    $incometax = $_POST['incometax'];
    $withholdingtax = $_POST['withholdingtax'];
    // benefits
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $thirteenthmonth = $_POST['thirteenthmonth'];

    $query = "INSERT INTO employees (first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, address, contact_no, email, department, position) VALUES (:firstName, :middleName, :lastName, :dateofbirth, :gender, :nationality, :civilstatus, :address, contactnumber, :email, :department, :position); INSERT INTO salary_info (base_salary, total_salary) VALUES (:basesalary, :totalsalary); INSERT INTO tax_info (income_tax, withholding_tax) VALUES (:incometax, :withholdingtax); INSERT INTO benefit_info (sss, pagibig, philhealth, thirteenth_month) VALUES (:sss, :pagibig, :philhealth, :thirteenthmonth);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);
    $stmt->bindParam(':civilstatus', $civilstatus, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':contactnumber', $contactnumber, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':department', $department, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    
    $lastInsertedEmployeeId = $conn->lastInsertId();
    
    $stmt->bindParam(':basesalary', $basesalary, PDO::PARAM_STR);
    $stmt->bindParam(':totalsalary', $totalsalary, PDO::PARAM_STR);
    $stmt->bindParam(':employees_id', $lastInsertedEmployeeId, PDO::PARAM_INT);
    
    $stmt->bindParam(':incometax', $incometax, PDO::PARAM_STR);
    $stmt->bindParam(':withholdingtax', $withholdingtax, PDO::PARAM_STR);
    $stmt->bindParam(':employees_id', $lastInsertedEmployeeId, PDO::PARAM_INT);
    
    $stmt->bindParam(':sss', $sss, PDO::PARAM_STR);
    $stmt->bindParam(':pagibig', $pagibig, PDO::PARAM_STR);
    $stmt->bindParam(':philhealth', $philhealth, PDO::PARAM_STR);
    $stmt->bindParam(':thirteenthmonth', $thirteenthmonth, PDO::PARAM_STR);
    $stmt->bindParam(':employees_id', $lastInsertedEmployeeId, PDO::PARAM_INT);

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($firstName) || empty($lastName) || empty($birthday) || empty($gender) || empty($nationality) || empty($civilstatus) || empty($address) || empty($contactnumber) || empty($email) || empty($department) || empty($position) || empty($basesalary) || empty($totalsalary) || empty($incometax) || empty($withholdingtax) || empty($sss) || empty($pagibig) || empty($philhealth) || empty($thirteenthmonth)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }

    // Execute the statement
    $stmt->execute();

    header("Location: $rootFolder/hr/employees");
});

// search employees
Router::post('/hr/employees', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $search = $_POST['search'];

    $rootFolder = dirname($_SERVER['PHP_SELF']);

    if (empty($search)) {
        header("Location: $rootFolder/hr/employees");
        return;
    }

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR department = :search OR id = :search;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Product Order';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Inventory';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Point of Sales';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Finance';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Delivery';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    $query = "SELECT * FROM employees WHERE first_name = :search OR last_name = :search OR position = :search OR id = :search AND department = 'Human Resources';";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);

    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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