<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESTYLE</title>

    <!-- Japanese-inspired font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    <style>
      body {
        font-family: 'Noto Sans JP', sans-serif;
      }
    </style>
  </head>
  <body class="bg-white text-gray-900">

    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 bg-red-100 shadow border-b border-red-300">
      <!-- Brand -->
      <div class="text-3xl font-bold text-red-600 tracking-widest">
        RESTYLE
      </div>

      <!-- Search -->
      <div class="flex items-center space-x-2">
        <input
          type="text"
          placeholder="Search..."
          class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
        />
        <button class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600">
          Search
        </button>
      </div>

      <!-- Right-side icons and links -->
      <div class="flex items-center space-x-4 text-sm">
        <a href="{{ url('/login') }}" class="text-gray-700 hover:underline">Login</a>
        <a href="{{ url('/register') }}" class="text-gray-700 hover:underline">Register</a>
        <span class="text-xl cursor-pointer">🌙</span>
        <span class="text-xl cursor-pointer">🛍️</span>
      </div>
    </header>

    <!-- Main Layout -->
    <div class="flex">
      <!-- Sidebar / Aside -->
      <aside class="w-72 p-6 bg-gray-50 border-r border-red-200 h-screen overflow-y-auto">
        <h2 class="text-2xl font-bold text-red-600 mb-6 border-b border-red-300 pb-2">Filters</h2>

        <div class="space-y-6 text-sm text-gray-800">
          <!-- Weather -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Weather</h3>
            <ul class="space-y-1">
              <li><input type="checkbox" id="sunny" /> <label for="sunny">Sunny</label></li>
              <li><input type="checkbox" id="rainy" /> <label for="rainy">Rainy</label></li>
              <li><input type="checkbox" id="cloudy" /> <label for="cloudy">Cloudy</label></li>
            </ul>
          </div>

          <!-- Size -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Size</h3>
            <ul class="space-y-1">
              <li><input type="checkbox" id="small" /> <label for="small">Small</label></li>
              <li><input type="checkbox" id="medium" /> <label for="medium">Medium</label></li>
              <li><input type="checkbox" id="large" /> <label for="large">Large</label></li>
            </ul>
          </div>

          <!-- Price -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Price Range</h3>
            <div class="flex space-x-2">
              <input type="number" placeholder="Min" class="w-full px-2 py-1 border border-gray-300 rounded" />
              <input type="number" placeholder="Max" class="w-full px-2 py-1 border border-gray-300 rounded" />
            </div>
          </div>

          <!-- Color -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Color</h3>
            <ul class="flex space-x-2">
              <li><span class="w-5 h-5 rounded-full bg-black inline-block border"></span></li>
              <li><span class="w-5 h-5 rounded-full bg-red-500 inline-block border"></span></li>
              <li><span class="w-5 h-5 rounded-full bg-blue-500 inline-block border"></span></li>
              <li><span class="w-5 h-5 rounded-full bg-green-500 inline-block border"></span></li>
              <li><span class="w-5 h-5 rounded-full bg-yellow-400 inline-block border"></span></li>
            </ul>
          </div>

          <!-- Brand -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Brand</h3>
            <ul class="space-y-1">
              <li><input type="checkbox" id="nike" /> <label for="nike">Nike</label></li>
              <li><input type="checkbox" id="adidas" /> <label for="adidas">Adidas</label></li>
              <li><input type="checkbox" id="uniqlo" /> <label for="uniqlo">Uniqlo</label></li>
              <li><input type="checkbox" id="zara" /> <label for="zara">Zara</label></li>
            </ul>
          </div>

          <!-- Availability -->
          <div>
            <h3 class="text-red-500 font-semibold mb-2">Availability</h3>
            <ul class="space-y-1">
              <li><input type="checkbox" id="in-stock" /> <label for="in-stock">In Stock</label></li>
              <li><input type="checkbox" id="out-of-stock" /> <label for="out-of-stock">Out of Stock</label></li>
            </ul>
          </div>

          <!-- Reset -->
          <div class="pt-4">
            <button class="w-full bg-red-200 text-red-800 py-2 rounded hover:bg-red-300">
              Reset Filters
            </button>
          </div>
        </div>
      </aside>

      <!-- Main content -->
      <main class="flex-1 p-6">
  
  <nav>
    <ul class="flex flex-nowrap gap-6 overflow-x-auto scrollbar-thin scrollbar-thumb-red-400 scrollbar-track-red-100 pb-2">
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Workwear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Sleepwear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Party wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Beachwear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Streetwear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Layering pieces</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Ethnic wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Maternity wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Festival wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Costume wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Dancewear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Utility wear</a></li>
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Accessories</a></li>
   
      <li><a href="#" class="whitespace-nowrap text-red-600 hover:text-red-800 font-medium">Performance wear</a></li>
    </ul>
  </nav>
</main>
<footer></</footer>

    </div>
  </body>
</html>
