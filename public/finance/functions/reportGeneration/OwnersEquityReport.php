<?php
require_once "IncomeReport.php";
//get all account in owner's equity
//designate the percentage
//distribute the loss/profit in the owner's equity
//display in html


function calculateShare($accountNumber){
    define("CAPITAL","Capital Accounts");

    $accountNumber = getLedgerCode($accountNumber);

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    //get share
    $accountBalance = abs(getAccountBalance($accountNumber));
    $allBalance = abs(getTotalOfAccountType(CAPITAL));
    //divide it by total share
    return $accountBalance/$allBalance;
}

function divideTheGainLoss($accountNumber, $year, $month){
    return calculateNetSalesOrLoss($year, $month) * calculateShare($accountNumber);
}

function insertShare($accountNumber, $year, $month){
    $db = Database::getInstance();
    $conn = $db->connect();
    $insertBalance = divideTheGainLoss($accountNumber, $year, $month);
    if ($insertBalance > 0) {
        $sql = "INSERT INTO LedgerTransaction (LedgerNo, amount, LedgerNo_Dr, details) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$accountNumber, $insertBalance]);
    }
}

function closeTemporaryAccounts($year, $month){

}

function checkRetainedEarningsLoss(){

}


function generateOEReport(){
    $db = Database::getInstance();
    $conn = $db->connect();
}
?>