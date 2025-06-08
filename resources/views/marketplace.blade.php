@extends('user_dashboard')

@section('content')

  <h2 class="text-2xl font-bold mb-6">🛒 Marketplace</h2>
@if (session('success'))
  <div
    id="toast-success"
    class="fixed top-6 right-6 bg-green-600 text-white px-6 py-3 rounded shadow-lg opacity-0"
    style="z-index: 1000; transition: opacity 0.5s ease;"
  >
    {{ session('success') }}
  </div>
@endif


  <section class="flex flex-wrap gap-6">
    @forelse ($products as $product)
      <div class="w-full sm:w-[320px] border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition relative bg-white">

        <!-- User who added the product -->
        <p class="text-sm text-gray-500 mb-2">
          👤 Added by: <span class="font-medium">{{ $product->user->name ?? 'Unknown' }}</span>
        </p>

        <!-- Product image -->
        @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
        @else
          <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 rounded mb-4">No Image</div>
        @endif

        <!-- Product details -->
        <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
        <p class="text-red-600 font-bold mb-2">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-gray-700 text-sm mb-4">{{ $product->description ?? 'No description' }}</p>

        @if ($product->user_id !== auth()->id())
          <form action="{{ route('transactions.store', $product->id) }}" method="POST">
            @csrf
         <button 
  type="submit" 
  class="w-full bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition" 
  onclick="return confirm('Are you sure you want to buy this product?')"
>
  Buy
</button>
          </form>
          
        @else
          <span class="block text-center text-sm text-gray-500">This is your product</span>
        @endif
      </div>
    @empty
      <p class="col-span-full text-center text-gray-500">No products available in the marketplace.</p>
    @endforelse
    
  </section>

  
@endsection

