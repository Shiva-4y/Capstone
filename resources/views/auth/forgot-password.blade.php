<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password - RESTYLE</title>

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
        <p class="text-sm text-gray-500 mt-2">No worries. We'll help you reset your password.</p>
      </div>

      <!-- Forgot Password Form -->
      <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
        @csrf

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

        <div>
          <button
            type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition"
          >
            Send Reset Link
          </button>
        </div>
      </form>

      <!-- Back to login -->
      <div class="mt-6 text-center text-sm text-gray-600">
        Remembered your password?
        <a href="{{ route('login') }}" class="text-red-500 hover:underline">Back to login</a>
      </div>
    </div>
  </body>
</html>
