<!DOCTYPE html>
<html>
<head>
    <title>Form Test</title>
   
</head>
<body>
    <form action="/insert" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" value="Submit">
    </form>
    <table>
        <tr><th>Name</th></tr>
        <?php
        $db = Database::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT id, name FROM name");
        
        // Execute the statement
        $stmt->execute();

        // Fetch all rows as an associative array
        $names = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Iterate over the names
        foreach ($names as $name) {
            // Access the name and id of the row and add it to the table
            // Also add a hyperlink to the /fin/test/{id} route with the id as a parameter
            echo "<tr><td><a route='/fin/test/id=" . $name['id'] . "'>" . $name['name'] . "</a></td></tr>";
        }
        ?>
    </table>

    <script src="./../src/form.js"></script>
    <script src="./../src/route.js"></script>
</body>
</html>

