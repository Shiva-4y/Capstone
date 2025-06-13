<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - RESTYLE</title>

    <!-- Japanese font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <style>
      body {
        font-family: 'Noto Sans JP', sans-serif;
      }
    </style>
  </head>

  <body class="bg-white text-gray-900 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-gray-50 p-8 rounded-lg shadow-lg border border-red-200">
      <!-- Brand Header -->
      <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-red-600 tracking-widest">RESTYLE</h1>
        <p class="text-sm text-gray-500 mt-2">Create your account to join the style revolution.</p>
      </div>

      <!-- Register Form -->
      <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <input
            type="text"
            id="name"
            name="name"
            required
            pattern="^[A-Za-z\s]+$"
            title="Only letters and spaces are allowed"
            placeholder="Your name"
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
          @error('name')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            placeholder="you@example.com"
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
          @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div class="relative">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$"
            title="Password must be at least 8 characters and include uppercase, lowercase, and a special character"
            placeholder="••••••••"
            class="w-full mt-1 px-4 py-2 pr-10 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
          <span
            class="absolute inset-y-0 right-3 top-8 flex items-center cursor-pointer"
            onclick="togglePassword('password', this)"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
            </svg>
          </span>
          @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            placeholder="••••••••"
            class="w-full mt-1 px-4 py-2 pr-10 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
          <span
            class="absolute inset-y-0 right-3 top-8 flex items-center cursor-pointer"
            onclick="togglePassword('password_confirmation', this)"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
            </svg>
          </span>
        </div>

        <!-- Register Button -->
        <div>
          <button
            type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition"
          >
            Register
          </button>
        </div>

        <!-- Divider -->
        <div class="text-center text-gray-400 text-sm py-2">OR</div>

        <!-- Google Button Placeholder -->
        <button type="button" class="w-full border border-red-300 text-red-600 py-2 rounded hover:bg-red-50 transition">
          Sign up with Google
        </button>
      </form>

      <!-- Login Link -->
      <div class="mt-6 text-center text-sm text-gray-600">
        Already have an account?
        <a href="{{ url('/login') }}" class="text-red-500 hover:underline">Log in here</a>
      </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
      function togglePassword(inputId, iconEl) {
        const input = document.getElementById(inputId);
        const isHidden = input.type === "password";
        input.type = isHidden ? "text" : "password";

        // Toggle eye icon
        iconEl.innerHTML = isHidden
          ? `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.964 9.964 0 012.195-3.356M3 3l18 18" />
            </svg>`
          : `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
            </svg>`;
      }
    </script>
  </body>
</html>
