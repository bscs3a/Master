<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>

<body>
    <!-- temp menu -->
    <div id="temp-menu" class="flex flex-col items-center justify-center h-screen">
        <br>
        <button onclick="location.href='/Master/adm/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Admin Page</button><br>
        <button onclick="location.href='/Master/sls/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Sales Page</button><br>
        <button onclick="location.href='/Master/inv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Inventory Page</button><br>
        <button onclick="location.href='/Master/hr/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Human Resources Page</button><br>
        <button onclick="location.href='/Master/fin/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Finance Page</button><br>
        <button onclick="location.href='/Master/dlv/sample'"
            class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Delivery Page</button><br>
        <button id="temp-logout" class="px-6 py-3 mb-2 text-white bg-blue-500 rounded hover:bg-blue-700">Log out</button>
    </div>

    <script>
        document.getElementById("temp-logout").addEventListener("click", function () {
        // Redirect to the index.php page
        window.location.href = "/Master/index.php";
    });
</script>
</body>
</html>