@extends('user_dashboard')

@section('content')
<h2 class="text-2xl font-bold text-red-600 mb-6">🛍️ Marketplace</h2>

@if(session('success'))
  <div class="p-3 bg-green-100 text-green-700 mb-4 rounded">
    {{ session('success') }}
  </div>
@endif

@if($products->isEmpty())
  <p class="text-gray-600">No products listed yet.</p>
@else
  <section class="flex flex-wrap gap-4">
    @foreach ($products as $product)
      <div class="w-full sm:w-[320px] border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition relative text-base group">

        <!-- 3-dot Report Menu -->
        <div class="absolute top-2 right-2 z-20">
          <button 
            class="text-gray-600 hover:text-red-500 text-xl focus:outline-none"
            onclick="toggleMenu(this)"
            type="button"
          >⋮</button>

          <div class="dropdown-menu hidden absolute right-0 mt-2 w-24 bg-white border border-gray-300 rounded shadow">
            <form action="#" method="POST" onsubmit="return confirm('Report this product?');">
              @csrf
              <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-gray-100">
                Report
              </button>
            </form>
          </div>
        </div>

        <!-- Seller Info -->
        <p class="text-sm text-gray-500 mb-2">
          👤 Added by: <span class="font-medium">{{ $product->user->name ?? 'Unknown' }}</span>
        </p>

        <!-- Product Image -->
        @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
        @else
          <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 rounded mb-4">No Image</div>
        @endif

        <!-- Product Info -->
        <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
        <p class="text-red-600 font-bold mb-1">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-gray-700 text-sm mb-3">{{ Str::limit($product->description, 60) }}</p>

        <!-- Add to Cart or Message Seller -->
        @if(auth()->id() !== $product->user_id)
          <form action="#" method="POST">
            @csrf
            <button class="w-full bg-red-600 text-white py-2 rounded transform transition duration-200 hover:bg-red-700 hover:scale-[1.03]">
              🛒 Add to Cart
            </button>
          </form>

          <a href="#"
            class="block mt-2 text-center bg-blue-600 text-white py-2 rounded transform transition duration-200 hover:bg-blue-700 hover:scale-[1.03]">
            💬 Message Seller
          </a>
        @endif
      </div>
    @endforeach
  </section>
@endif
@endsection

@push('scripts')
<script>
  function toggleMenu(button) {
    const dropdown = button.nextElementSibling;
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      if (menu !== dropdown) menu.classList.add('hidden');
    });
    dropdown.classList.toggle('hidden');
  }

  document.addEventListener('click', function (e) {
    const insideMenu = e.target.closest('.dropdown-menu') || e.target.closest('button[onclick^="toggleMenu"]');
    if (!insideMenu) {
      document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
    }
  });
</script>
@endpush
