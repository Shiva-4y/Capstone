@extends('user_dashboard')

@section('content')
@if (session('success'))
  <div
    id="toast-success"
    class="fixed top-4 right-4 bg-green-500 text-white px-4 py-3 rounded shadow-lg opacity-100 transition-opacity duration-500"
    role="alert"
  >
    {{ session('success') }}
  </div>
@endif

{{-- Virtual Wardrobe Placeholder --}}
<h2 class="text-2xl font-bold mb-6">👗 Virtual Wardrobe</h2>
<div class="text-gray-500 text-center italic mb-12">
  This section kay wala pay suuuuud xdasdasd yet.
</div>

{{-- My Products --}}
<h2 class="text-2xl font-bold mb-6">🧍 My Products</h2>
<div class="mb-4">
  <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-red-100 hover:bg-red-200 text-red-600 font-semibold transition">
    ➕ Add Product
  </a>
</div>

@php
  $myProducts = $products->where('user_id', auth()->id());
@endphp

<section class="flex flex-wrap gap-4">
  @forelse ($myProducts as $product)
    <div class="w-full sm:w-[320px] border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition relative text-base">
      
      {{-- 3-dot menu --}}
      <div class="absolute top-2 right-2">
        <button 
          class="text-gray-600 hover:text-red-500 text-xl focus:outline-none"
          title="Options"
          onclick="toggleMenu(this)"
          type="button"
        >⋮</button>
        <div class="hidden absolute right-0 mt-6 w-24 bg-white border border-gray-300 rounded shadow-lg z-10">
          <a href="{{ route('products.edit', $product) }}" class="block px-4 py-2 hover:bg-gray-100 text-blue-600 cursor-pointer">Edit</a>
          <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600 cursor-pointer">Delete</button>
          </form>
        </div>
      </div>

      {{-- Image and Info --}}
      @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
      @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 rounded mb-4">No Image</div>
      @endif
      <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
      <p class="text-red-600 font-bold mb-2">₱{{ number_format($product->price, 2) }}</p>
      <p class="text-gray-700 text-sm">{{ $product->description ?? 'No description' }}</p>
    </div>
  @empty
    <p class="col-span-full text-center text-gray-500">You haven't added any products yet.</p>
  @endforelse
</section>
@endsection

<script>
  function toggleMenu(button) {
    // Find the sibling dropdown menu div
    const menu = button.nextElementSibling;
    if (!menu) return;

    // Toggle visibility
    if (menu.classList.contains('hidden')) {
      // Hide any other open menus first
      document.querySelectorAll('.absolute > div:not(.hidden)').forEach(el => el.classList.add('hidden'));
      menu.classList.remove('hidden');
    } else {
      menu.classList.add('hidden');
    }
  }

  // Optional: close menus if clicked outside
  document.addEventListener('click', function(event) {
    if (!event.target.closest('.absolute')) {
      document.querySelectorAll('.absolute > div:not(.hidden)').forEach(el => el.classList.add('hidden'));
    }
  });

  window.addEventListener('DOMContentLoaded', () => {
    const toast = document.getElementById('toast-success');
    if (!toast) return;

    // After 3 seconds, fade out
    setTimeout(() => {
      toast.style.opacity = '0';
      
      // After transition (0.5s), remove from DOM
      setTimeout(() => {
        toast.remove();
      }, 500);
    }, 3000);
  });
</script>

