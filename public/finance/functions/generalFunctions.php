<?php
//get the value of 1 t-account - can return negative or positive
function getAccountBalance($ledger, $considerDate = false, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $ledgerNo = getLedgerCode($ledger);

    // If getLedgerCode returns false, throw an exception
    if ($ledgerNo === false) {
        throw new Exception("Account not found in Ledger table.");
    }
    // If the year and month are not specified while you want to consider date, throw an exception
    if ($considerDate && ($year === null || $month === null)) {
        throw new Exception("Year and month must be specified when considering date.");
    }

    // Fetch entries from the LedgerTransaction table
    if ($considerDate && $year !== null && $month !== null) {
        $sql = "SELECT * FROM LedgerTransaction WHERE ledgerno = ? AND YEAR(date) = ? AND MONTH(date) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo, $year, $month]);
    } else {
        $sql = "SELECT * FROM LedgerTransaction WHERE ledgerno = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo]);
    }

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

//get the value of 1 group type - always returns positve
function getTotalOfGroup($groupType) {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Fetch all transactions for ledgers(considering grouptype) on ledgerNo(credit)
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->execute();

    $netAmount = 0;

    // Calculate the net amount
    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }

    // Fetch all transactions for ledgers(considering grouptype) on ledgerNo_dr(debit)
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->execute();

    // Subtract the amounts for expense accounts
    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return abs($netAmount);
}
?>