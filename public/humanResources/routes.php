<?php

$path = './public/humanResources/views';
$basePath = "$path/hr.";

$hr = [
    // Dashboard
    '/hr/dashboard' => $basePath . "dashboard.php",

    // employee profile
    '/hr/employees' => $basePath . "employees.php",
    '/hr/employees/add' => $basePath . "employees.add.php",
    '/hr/employees/update' => $basePath . "employees.add.php",
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
];

