@extends('user_dashboard')

@section('content')
  <h2 class="text-2xl font-bold mb-6">📦 Items</h2>

  <section class="flex flex-wrap gap-4">
    @forelse ($products as $product)
      <div class="w-full sm:w-[320px] border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition relative text-base">

        <!-- 3-dot menu (top-right corner) -->
        <div class="absolute top-2 right-2">
          <button class="text-gray-600 hover:text-red-500 text-xl" title="Options">⋮</button>
        </div>

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
        <h2 class="text-lg font-semibold mb-2">{{ $product->name }}</h2>
        <p class="text-red-600 font-bold mb-2">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-gray-700 text-sm">{{ $product->description ?? 'No description' }}</p>
      </div>
    @empty
      <p class="col-span-full text-center text-gray-500">You haven't added any products yet.</p>
    @endforelse
  </section>
@endsection
