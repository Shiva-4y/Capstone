<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-200 p-6 flex flex-col">
      <div class="flex items-center mb-8 space-x-4">
    <img
      src="{{ auth()->user()->profile_photo_url ?? 'https://i.pravatar.cc/48?u=' . auth()->user()->id }}"
      alt="Profile Picture"
      class="w-12 h-12 rounded-full border-2 border-red-500 object-cover"
    />
    <div>
      <p class="text-lg font-semibold text-red-600">{{ auth()->user()->name }}</p>
      <a href="#" class="text-sm text-gray-500 hover:underline">View Profile</a>
    </div>
  </div>
    <nav class="flex-grow">
      <ul class="space-y-3 text-gray-700 font-medium">
        <li>
          <a href="{{ url('/user_dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            🏠 Dashboard Home
          </a>
        </li>
        <li>
          <a href="{{ route('products.create') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-gray-100 font-semibold text-red-600">
            ➕ Add Product
          </a>
        </li>
        <li>
          <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
            📦 View My Products
          </a>
        </li>
       
    
        <li>
          <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            ⚙️ Profile Settings
          </a>
        </li>
        <li>
          <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            🧾 Order History
          </a>
        </li>
        <li>
          <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">
            🔔 Notifications
          </a>
        </li>
      </ul>
    </nav>

    <form method="POST" action="#">
      @csrf
      <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100 font-medium text-gray-700">
        🔓 Logout
      </button>
    </form>
  </aside>

  <!-- Main content -->
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

      <!-- (Optional) Profile -->
     
    </div>
  </header>

  <!-- Content section -->
<section>
  @yield('content')
</section>
</main>


</body>
</html>
