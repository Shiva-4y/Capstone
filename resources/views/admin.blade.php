<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel - RESTYLE</title>

    <!-- Japanese font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <style>
      body {
        font-family: 'Noto Sans JP', sans-serif;
      }
    </style>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('products-toggle');
        const submenu = document.getElementById('products-submenu');
        const arrow = document.getElementById('arrow-icon');

        toggle.addEventListener('click', () => {
          submenu.classList.toggle('hidden');
          arrow.classList.toggle('rotate-180');
        });
      });
    </script>
  </head>

  <body class="bg-white text-gray-900 flex min-h-screen">

    <!-- Sidebar / Aside -->
<aside class="w-72 bg-gray-50 border-r border-red-200 p-6">
  <h1 class="text-3xl font-bold text-red-600 tracking-widest mb-8">Admin</h1>

  <nav class="space-y-2 text-gray-800 text-sm">
    <!-- Products Dropdown -->
    <div>
      <button id="products-toggle" class="w-full flex items-center justify-between px-3 py-2 hover:bg-red-100 rounded transition">
        <span class="flex items-center gap-2 text-red-600 font-medium">
          <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0H4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6" />
          </svg>
          Products
        </span>
        <svg id="arrow-icon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      <ul id="products-submenu" class="hidden ml-8 mt-2 space-y-1">
        
        <li><a href="#" class="flex items-center gap-2 px-3 py-1 rounded hover:bg-gray-100">
          📋 Product List</a></li>
        <li><a href="#" class="flex items-center gap-2 px-3 py-1 rounded hover:bg-gray-100">
          🗂️ Categories</a></li>
        <li><a href="#" class="flex items-center gap-2 px-3 py-1 rounded hover:bg-gray-100">
          🏷️ Brands</a></li>
      </ul>
    </div>

    <!-- Other Links -->
    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 118 0v2m-4 4h.01M5 7h14M5 7a2 2 0 012-2h10a2 2 0 012 2M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7" />
      </svg>
      Orders
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A3 3 0 016 17h12a3 3 0 011.879.804M16 7a4 4 0 10-8 0 4 4 0 008 0z" />
      </svg>
      Customers
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      📊 Statistics
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      📝 Reviews
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      💳 Transactions
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      🧑‍💼 Sellers
    </a>

    <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-red-100 rounded">
      ⚙️ Settings
    </a>
  </nav>
</aside>


    <!-- Main Content -->
    <main class="flex-1 p-8">
    <header class="mb-6 flex items-center justify-between">
  <!-- Search Bar -->
  <div class="flex items-center w-full max-w-md">
    <input
      type="text"
      placeholder="Search..."
      class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-red-400"
    />
    <button class="bg-red-500 text-white px-4 py-2 rounded-r-md hover:bg-red-600">
      Search
    </button>
  </div>

  <!-- Right-side icons -->
  <div class="flex items-center space-x-6 ml-6">
    <!-- Dark Mode Toggle -->
    <button id="dark-toggle" class="text-xl hover:text-red-500">
      🌙
    </button>

    <!-- Notification Bell -->
    <button class="relative text-xl hover:text-red-500">
      🔔
      <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
    </button>

    <!-- Profile with Dropdown -->
    <div class="relative">
      <button id="profile-menu-button" class="flex items-center space-x-2 focus:outline-none">
        <img
          src="https://i.pravatar.cc/40"
          alt="Profile"
          class="w-10 h-10 rounded-full border-2 border-red-300"
        />
        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <!-- Dropdown -->
      <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-md z-10">
       <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
  Logout
</a>
      </div>
    </div>
  </div>
</header>

<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
  @forelse ($products as $product)
    <div class="border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition">
      @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
      @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 rounded mb-4">
          No Image
        </div>
      @endif

      <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
      <p class="text-red-600 font-bold mb-2">₱{{ number_format($product->price, 2) }}</p>
      <p class="text-gray-700 text-sm">{{ $product->description ?? 'No description' }}</p>
    </div>
  @empty
    <p class="col-span-full text-center text-gray-500">No products available.</p>
  @endforelse
</section>
      
    </main>
  </body>
</html>
