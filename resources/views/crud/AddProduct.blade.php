<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add Product - USER</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen py-12 px-6">

  <div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg border border-gray-200 p-8">
    <h1 class="text-3xl font-extrabold text-red-600 mb-8 flex items-center gap-2">
      <span class="text-4xl">➕</span> Add New Product
    </h1>

    @if(session('success'))
      <div class="mb-6 p-4 text-green-900 bg-green-100 rounded shadow-sm border border-green-300">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Product Name -->
      <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
        <input
          type="text" id="name" name="name" required
          placeholder="Enter product name"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition"
        />
      </div>

      <!-- Price -->
      <div>
        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (₱)</label>
        <input
          type="number" id="price" name="price" step="0.01" required
          placeholder="0.00"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition"
        />
      </div>

      <!-- Product Picture -->
      <div>
        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Product Image</label>
        <input
          type="file" id="image" name="image" accept="image/*"
          class="w-full text-sm text-gray-600
            file:border file:border-gray-300 file:rounded-lg
            file:px-4 file:py-2 file:bg-gray-100
            hover:file:bg-gray-200
            transition
          "
        />
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description <span class="text-gray-400 text-xs">(optional)</span></label>
        <textarea
          id="description" name="description" rows="4"
          placeholder="Write a short description about the product"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition resize-none"
        ></textarea>
      </div>

      <!-- Submit -->
      <div class="text-right">
        <button
          type="submit"
          class="bg-red-600 text-white font-semibold px-8 py-3 rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 transition"
        >
          Add Product
        </button>
      </div>
    </form>
  </div>

</body>
</html>
