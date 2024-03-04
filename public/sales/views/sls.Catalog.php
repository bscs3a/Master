
<!doctype html>
<html>

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./../src/tailwind.css" rel="stylesheet">
  <script src="./tailwind3.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- page -->
<main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <!-- header page -->
 
    <div class="flex justify-end">
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 w-full">

<div>
<div class="grid grid-cols-2">
<div class="size-14 border border-gray-500 rounded-md w-96 bg-gray-300 mb-20 font-semibold text-2xl flex items-center p-4">
<div class="grid grid-cols-3">
<svg xmlns="http://www.w3.org/2000/svg" class="size-8" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 5C13.567 5 12 6.567 12 8.5C12 10.433 13.567 12 15.5 12C17.433 12 19 10.433 19 8.5C19 6.567 17.433 5 15.5 5ZM10 8.5C10 5.46243 12.4624 3 15.5 3C18.5376 3 21 5.46243 21 8.5C21 9.6575 20.6424 10.7315 20.0317 11.6175L22.7071 14.2929L21.2929 15.7071L18.6175 13.0317C17.7315 13.6424 16.6575 14 15.5 14C12.4624 14 10 11.5376 10 8.5ZM3 4H8V6H3V4ZM3 11H8V13H3V11ZM21 18V20H3V18H21Z"></path></svg>
Filter
</div> 
</div>
<div class="size-14 w-full rounded-md justify-end mb-20 font-semibold text-2xl flex items-center">
<button type="button" class="items-center flex bg-gray-300 rounded-md p-3" @click="asideOpen = !asideOpen">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="flex justify-center bi bi-chevron-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.854 3.646a.5.5 0 0 1 0 .708L8.207 8l3.647 3.646a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708 0M4.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-.5-.5"/>
</svg>
View Cart
</button>
</div>
</div>

<div class="text-3xl font-bold divide-y mb-10">Items</div>
<div class="grid grid-cols-6 gap-4">
<div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
      <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
      <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
      <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
      <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
      <div class="w-62 h-74 p-10 flex flex-col items-center border rounded-lg border-solid border-gray-300 shadow-lg">
          <div class="size-32 rounded-full shadow-md bg-yellow-200 mb-4"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg></div>
          <div class="font-bold text-xl">Example Name</div>
          <div class="mt-8 text-xl font-semibold">Php500</div>
          <div class="text-gray-500">Stocks:</div>
      </div>
</div>
</div>
  
</div>
        <!-- aside -->

        <aside class="sticky top-[20rem] space-y-2 border-r-2 border-gray-200 bg-white p-2" style="height: 80vh"
            x-show="asideOpen">
            <div class="flex w-full items-center px-2 py-3 text-black no-underline text-2xl bg-gray-400">
            <i class='bx bxs-cart' ></i>
                <span class="ml-2 font-bold">Cart</span>
            </div>

            <div class="grid grid-rows-3 gap-4 grid-flow-row h-full">

            <div class="grid grid-cols-2 gap-24 pb-2 font-semibold">
            <div>
            <button class="flex items-center justify-center size-10 w-32 bg-gray-200 rounded-md">
            <i class='bx bx-plus-circle font-bold text-md mr-2'></i>
              <span>New Order</span>
            </button>
            </div>
            <div>
            <button class="size-10 w-20 bg-gray-200 rounded-md">
              <i class="bx bx-trash"></i>
            </button>
            </div>
            </div>

            <div class="">
                
            </div>

            <div class="bg-gray-300 font-semibold tracking-wide">
            <ul class="list-none mt-2">
                <li class="mt-2">Subtotal: <b class="font-semibold text-gray-500">1000</b></li>
                <li class="mt-2">Shipping: <b class="font-semibold text-gray-500">1000</b></li>
                <li class="mt-2">Tax: <b class="font-semibold text-gray-500">1000</b></li>
                <li class="font-bold text-2xl mt-20">Total: <b class="font-semibold text-gray-500">1000</b></li>
            </ul>
            
            <div class="grid grid-cols-2 mx-2">
            <button class="items-center justify-center size-10 w-32 bg-white rounded-md">
            <i class='bx bx-plus-circle font-bold text-md mr-2'></i>
              <span>Hold</span>
            </button>

            <button class="items-center justify-center size-10 w-32 bg-white rounded-md">
            <i class='bx bxs-check-square' ></i>
              <span>Proceed</span>
            </button>

            </div>

            </div>

         
            
        </aside>
        <!-- main content page -->
        
 
</main>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
<!-- Sidebar -->
</div>
</body>


</html>
