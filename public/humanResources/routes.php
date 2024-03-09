<?php 

$path = './public/humanResources/views';

Router::handle('GET', '/hr/sample', "$path/hr.sample.php");
Router::handle('GET', '/hr/link', "$path/hr.test-link.php");

// dashboard
Router::handle('GET', '/hr/dashboard', "$path/hr.dashboard.php");

// employee profile
Router::handle('GET', '/hr/employees', "$path/hr.employees.php");
Router::handle('GET', '/hr/employees/add', "$path/hr.employee.add.php");
Router::handle('GET', '/hr/employees/update', "$path/hr.employee.add.php");

// departments
Router::handle('GET', '/hr/employees/departments/product-order', "$path/hr.departments.PO.php");
Router::handle('GET', '/hr/employees/departments/inventory', "$path/hr.departments.inv.php");
Router::handle('GET', '/hr/employees/departments/sales', "$path/hr.departments.POS.php");
Router::handle('GET', '/hr/employees/departments/finance', "$path/hr.departments.fin.php");
Router::handle('GET', '/hr/employees/departments/delivery', "$path/hr.departments.dlv.php");
Router::handle('GET', '/hr/employees/departments/human-resources', "$path/hr.departments.HR.php");


Router::handle('GET', '/hr/schedule', "$path/hr.schedule.php");
Router::handle('GET', '/hr/applicants', "$path/hr.applicants.php");
Router::handle('GET', '/hr/payroll', "$path/hr.payroll.php");
Router::handle('GET', '/hr/leave-requests', "$path/hr.leave-requests.php");

