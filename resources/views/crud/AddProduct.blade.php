<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product - USER</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen py-10 px-6">

  <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow border border-gray-200">
    <h1 class="text-2xl font-bold text-red-600 mb-6">➕ Add New Product</h1>
    
@if(session('success'))
  <div class="mb-4 p-4 text-green-800 bg-green-200 rounded">
    {{ session('success') }}
  </div>
@endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Product Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
        <input type="text" id="name" name="name" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-400">
      </div>

      <!-- Price -->
      <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Price (P)</label>
        <input type="number" id="price" name="price" step="0.01" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-400">
      </div>

      <!-- Product Picture -->
      <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
        <input type="file" id="image" name="image" accept="image/*"
               class="mt-1 block w-full text-sm text-gray-600 file:border file:border-gray-300 file:rounded file:px-4 file:py-2 file:bg-gray-100 hover:file:bg-gray-200">
      </div>

      <!-- Description (optional) -->
      <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-400"></textarea>
      </div>

      <!-- Submit -->
      <div class="text-right">
        <button type="submit"
                class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
          Add Product
        </button>
      </div>
    </form>
  </div>

</body>
</html>
