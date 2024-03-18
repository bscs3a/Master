<!DOCTYPE html>
<html>

<head>
    <title>Form Test</title>
    <!-- <link href="./../src/tailwind.css" rel="stylesheet"> -->
</head>

<body>

    <table>
        <form action="/fin/test" class="flex-col">
            <input type="text" id="date" name="date" placeholder="Date"><br>
            <script>
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];
                var mm = monthNames[today.getMonth()]; //January is 0!
                var yyyy = today.getFullYear();

                today = mm + ' ' + dd + ', ' + yyyy;
                document.getElementById('date').value = today;
            </script>
            <input type="text" id="description" name="description" placeholder="Description"><br>
            <input type="text" id="amount" name="amount" placeholder="Amount"><br>
            <select id="debit" name="debit"><br><br>
                <?php
                $db = Database::getInstance();
                $conn = $db->connect();

                $sql = "SELECT * FROM ledger";
                $stmt = $conn->prepare($sql);

                $stmt->execute();

                echo "<option value=\"choose\" selected=\"selected\">...</option>";

                if ($stmt->rowCount() > 0) {
                    // output data of each row
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['ledgerno']}\">{$row['name']}</option>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </select>

            <select id="credit" name="credit"><br>
                <?php
                $db = Database::getInstance();
                $conn = $db->connect();

                $sql = "SELECT * FROM ledger";
                $stmt = $conn->prepare($sql);

                $stmt->execute();

                echo "<option value=\"choose\" selected=\"selected\">...</option>";

                if ($stmt->rowCount() > 0) {
                    // output data of each row
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$row['ledgerno']}\">{$row['name']}</option>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </select>
            <input type="submit" value="Submit"><br>
        </form>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Credit</th>
            <th>Debit</th>
            <th>Details</th>
        </tr>
        <?php
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM ledgertransaction");

        // Execute the statement
        $stmt->execute();

        // Fetch all rows as an associative array
        $ledger = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Iterate over the names
        foreach ($ledger as $led) {
            // Access the name and id of the row and add it to the table
            // Also add a hyperlink to the /fin/test/{id} route with the id as a parameter
            echo "<tr><td>{$led['DateTime']}</td><td>{$led['amount']}</td><td>{$led['details']}</td><td>{$led['LedgerNo']}</td></tr>";
        }
        ?>
    </table>

    <script src="./../src/form.js"></script>
    <script src="./../src/route.js"></script>
</body>

</html>