<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - RESTYLE</title>
    @vite('resources/css/app.css')
  </head>
  <body class="bg-white text-gray-900 min-h-screen flex items-center justify-center px-4">
    
    <div class="w-full max-w-md bg-gray-50 p-8 rounded-lg shadow-md border">
      <!-- Brand -->
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">RESTYLE</h1>
        <p class="text-gray-500 mt-1">Welcome back. Please log in to continue.</p>
      </div>

      <!-- Login Form -->
      <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="you@example.com"
          />
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="••••••••"
          />
        </div>

        <!-- Remember me and Forgot -->
        <div class="flex items-center justify-between">
          <label class="flex items-center text-sm text-gray-600">
            <input type="checkbox" name="remember" class="mr-2">
            Remember me
          </label>
          <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
        </div>

        <!-- Submit -->
        <div>
          <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
          >
            Log In
          </button>
        </div>
      </form>

      <!-- Register link -->
      <div class="mt-6 text-center text-sm text-gray-600">
        Don’t have an account?
        <a href="{{ url('/register') }}" class="text-blue-500 hover:underline">Register here</a>
      </div>
    </div>

  </body>
</html>
