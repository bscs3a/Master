<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../src/tailwind.css" rel="stylesheet">
    <title>Test Link</title>
</head>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="mb-6 text-3xl font-bold text-center text-blue-500">This is a Test-link Routing for Product Order
        </h1>
        <button route='/po/sample'
            class="px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-700">Go to Product Order</button>
    </div>
    <script  src="./../src/route.js"></script>
</body>

</html>