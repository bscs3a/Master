<?php 
    require_once '../../functions/reportGeneration/IncomeReport.php';
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
    For month ended 31st December 2020

    <?php
        echo generate_html();
    ?>
</body>
</html>