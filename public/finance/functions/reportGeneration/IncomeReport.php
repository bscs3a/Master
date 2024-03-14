<?php
require_once '../../../../src/dbconn.php';

// used for getting the accountbalance
// problems:
// must consider date
// must consider closing balance table(ledgerstatement)
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
    define("INCOME", "IC");
    define("EXPENSE", "EP");

    // income - expense = netsales or loss
    return getTotalOfGroup(INCOME) - getTotalOfGroup(EXPENSE);
}

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


function generate_html() {
    $db = Database::getInstance();
    $conn = $db->connect();

    // Query data
    $grouptype_data = $conn->query('SELECT * FROM grouptype')->fetchAll();
    $accounttype_data = $conn->query('SELECT * FROM accounttype')->fetchAll();
    $ledger_data = $conn->query('SELECT * FROM ledger')->fetchAll();

    // Sort grouptype_data(in descending order -- needed)
    usort($grouptype_data, function($a, $b) {
        return strcmp($b['grouptype'], $a['grouptype']);
    });

    $html = "<ul>\n";
    foreach ($grouptype_data as $group) {
        if ($group['grouptype'] != "IC" && $group['grouptype'] != "EP") {
            continue;
        }
        $html .= "<li>\n<h1>{$group['description']}</h1>\n<ul>\n";
        foreach ($accounttype_data as $account) {
            if ($account['grouptype'] == $group['grouptype']) {
                $html .= "<li>\n{$account['Description']}\n<ul>\n";
                foreach ($ledger_data as $ledger) {
                    if ($ledger['AccountType'] == $account['AccountType']) {
                        $balance = getAccountBalance($ledger['ledgerno']);
                        $html .= "<li>\n<span>{$ledger['name']}</span>&emsp;<span>{$balance}</span>\n</li>\n";
                    }
                }
                $html .= "</ul>\n</li>\n";
            }
        }
        $total = getTotalOfGroup($group['grouptype']);
        $resultText = $group['grouptype'] == "IC" ? "Gross Profit" : "Total Expense";
        $html .= "</ul>\n<span>{$resultText}</span>&emsp;<span>{$total}</span>\n</li>\n";
    }
    $netSalesOrLoss = calculateNetSalesOrLoss();
    $textSalesOrLoss = $netSalesOrLoss > 0 ? "Net Sales" : "Net Loss";
    $html .= "
    <li>
        <span>{$textSalesOrLoss}</span>&emsp;<span>{$netSalesOrLoss}</span>
    <li>";

    $html .= "</ul>";

    return $html;
}
?>