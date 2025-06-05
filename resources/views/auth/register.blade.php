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
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="••••••••"
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
          @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
          @enderror

          <div class="mt-1 text-sm">
            <label class="inline-flex items-center">
              <input type="checkbox" class="mr-2" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';" />
              Show password
            </label>
          </div>
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            placeholder="••••••••"
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
          />
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
  </body>
</html>
