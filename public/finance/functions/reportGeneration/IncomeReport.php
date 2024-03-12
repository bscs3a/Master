<?php
require_once '../../../../src/dbconn.php';

// used for getting the accountbalance
function getAccountBalance($ledger) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $ledgerNo = getLedgerCode($ledger);

    // If getLedgerCode returns false, throw an exception
    if ($ledgerNo === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    // Fetch entries from the LedgerStatement table
    $sql = "SELECT * FROM LedgerTransaction WHERE ledgerno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledgerNo]);

    $balance = 0;

    while ($row = $stmt->fetch()) {
        if ($row['LedgerNo_dr'] == $ledgerNo) {
            $balance += $row['amount'];
        } else if ($row['LedgerNo'] == $ledgerNo) {
            $balance -= $row['amount'];
        }
    }

    return $balance;
}


// used for getting the ledger code
function getLedgerCode($ledger){
    $db = Database::getInstance();
    $conn = $db->connect();

    // Check if the account exists in the Ledger table
    $sql = "SELECT ledgerno FROM Ledger WHERE ledgerno = ? OR name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledger, $ledger]);
    $ledgerNo = $stmt->fetchColumn();

    return $ledgerNo;

}
function calculateNetSalesOrLoss() {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Fetch all transactions for ledgers classified under IC and EP
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType IN ('IC', 'EP')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $netAmount = 0;

    // Calculate the net amount
    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }

    // Fetch all transactions for ledgers classified under EP
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType IN ('IC', 'EP')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Subtract the amounts for expense accounts
    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return $netAmount;
}
?>