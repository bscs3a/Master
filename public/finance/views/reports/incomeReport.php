<?php 
    require_once '../../functions/reportGeneration/IncomeReport.php';

    $today = new DateTime();
    $lastDayOfMonth = new DateTime($today->format('Y-m-t'));

    if ($today < $lastDayOfMonth) {
        $today->modify('-1 month');
    }

    $year = $today->format('Y');
    $month = $today->format('n');

    if (isset($_POST['year']) && isset($_POST['month'])){
        $year = $_POST['year'];
        $month = $_POST['month'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Report</title>
</head>
<style>
    ul {
        list-style-type: none;
    }
</style>

<body>
    Company B
    Income Statement
    For month ended <?php echo "$month $year"?>
    <?php
        echo generateIncomeReport($year, $month);
    ?>
</body>
</html>