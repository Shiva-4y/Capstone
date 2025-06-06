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
  <!-- Profile -->
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

  <!-- Navigation -->
  <nav class="flex-grow">
    <ul class="space-y-3 text-gray-700 font-medium">

      <li>
        <a href="{{ url('/user_dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          🏠 <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ route('products.create') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 text-red-600 font-semibold transition">
          ➕ <span>Add Product</span>
        </a>
      </li>

      <li>
        <a href="{{ route('products.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          📦 <span>My Products</span>
        </a>
      </li>

      <li>
        <a href="{{ url('/marketplace') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          🛒 <span>Marketplace</span>
        </a>
      </li>

      

      <li>
        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          🧾 <span>Order History</span>
        </a>
      </li>

      <li>
        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          💬 <span>Messages</span>
        </a>
      </li>

      <li>
        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          ❓ <span>Help & Support</span>
        </a>
      </li>

      <li>
        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-red-50 transition">
          ⚙️ <span>Settings</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Logout -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 rounded hover:bg-red-100 text-gray-700 font-medium transition">
      🔓 <span>Logout</span>
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
    <div class="relative" id="notification-container">
  <button id="notification-toggle" class="text-xl hover:text-red-500 focus:outline-none">
    🔔
    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
  </button>

  <!-- Dropdown -->
  <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
    <div class="p-4 text-sm text-gray-600">
      No new notifications.
    </div>
  </div>
</div>


    </div>
  </header>

  <!-- Content section -->
<section>
  @yield('content')
</section>
</main>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("notification-toggle");
    const dropdown = document.getElementById("notification-dropdown");
    const redDot = toggle.querySelector("span");

    toggle.addEventListener("click", function (e) {
      e.stopPropagation();
      dropdown.classList.toggle("hidden");

      // Remove red dot on open
      if (redDot) {
        redDot.remove();
      }
    });

    document.addEventListener("click", function (e) {
      const container = document.getElementById("notification-container");
      if (!container.contains(e.target)) {
        dropdown.classList.add("hidden");
      }
    });
  });
</script>

</body>
</html>
