<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - RESTYLE</title>

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
        @if(session('success'))
  <div class="mb-4 p-4 border border-green-300 bg-green-100 text-green-800 rounded text-center">
    {{ session('success') }}
  </div>
@endif

      <!-- Brand Header -->
      <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-red-600 tracking-widest">RESTYLE</h1>
        <p class="text-sm text-gray-500 mt-2">Welcome back. Log in to continue your fashion journey.</p>
      </div>

      <!-- Login Form -->
      <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Email Field -->
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

        <!-- Password Field -->
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

          <!-- Show Password Toggle -->
          <div class="mt-1 text-sm">
            <label class="inline-flex items-center">
              <input type="checkbox" class="mr-2" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';" />
              Show password
            </label>
          </div>
        </div>

        <!-- Remember Me + Forgot -->
        <div class="flex items-center justify-between">
          <label class="flex items-center text-sm text-gray-600">
            <input type="checkbox" name="remember" class="mr-2"> Remember me
          </label>
          <a href="{{ route('password.request') }}" class="text-sm text-red-500 hover:underline">
  Forgot password?
</a>
        </div>

        <!-- Submit Button -->
        <div>
          <button
            type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition"
          >
            Log In
          </button>
        </div>

        <!-- Or Divider -->
        <div class="text-center text-gray-400 text-sm py-2">OR</div>

        <!-- Google Login Placeholder -->
        <button type="button" class="w-full border border-red-300 text-red-600 py-2 rounded hover:bg-red-50 transition">
          Sign in with Google
        </button>
      </form>

      <!-- Register Link -->
      <div class="mt-6 text-center text-sm text-gray-600">
        Don’t have an account?
        <a href="{{ url('/register') }}" class="text-red-500 hover:underline">Register here</a>
      </div>
    </div>

  </body>
</html>
