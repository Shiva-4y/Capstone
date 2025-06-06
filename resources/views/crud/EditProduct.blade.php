@extends('user_dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Product</h2>

@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
    @csrf
    @method('PUT')

    <label class="block mb-2 font-semibold">Name:</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="border rounded w-full mb-4 p-2" required>

    <label class="block mb-2 font-semibold">Price:</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="border rounded w-full mb-4 p-2" required>

    <label class="block mb-2 font-semibold">Description:</label>
    <textarea name="description" class="border rounded w-full mb-4 p-2">{{ old('description', $product->description) }}</textarea>

<label class="block mb-2 font-semibold">Image:</label>

<label id="file-label" class="inline-block cursor-pointer bg-white border border-gray-400 rounded px-4 py-2 text-gray-700 hover:border-blue-500 hover:text-blue-600 transition">
  Choose Image
  <input type="file" name="image" id="image-input" class="hidden" />
</label>

<p id="file-name" class="mt-2 text-sm text-gray-600"></p>


<p id="file-name" class="mt-2 text-sm text-gray-600"></p>

    @if($product->image)
        <div class="mb-4">
            <p class="font-semibold mb-1">Current Image:</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-48 rounded">
        </div>
    @endif

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Product</button>
</form>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image-input');
    const fileNameDisplay = document.getElementById('file-name');

    input.addEventListener('change', function () {
      const fileName = input.files.length > 0 ? input.files[0].name : '';
      fileNameDisplay.textContent = fileName ? `Selected: ${fileName}` : '';
    });
  });
</script>
@endsection



