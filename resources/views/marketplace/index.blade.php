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
  <section class="flex flex-wrap gap-4" x-data="{ expanded: null }">
    @foreach ($products as $product)
      <div 
        class="w-full sm:w-[320px] border border-gray-300 rounded-lg p-4 shadow hover:shadow-lg transition relative text-base bg-white cursor-pointer"
        @click="expanded === {{ $product->id }} ? expanded = null : expanded = {{ $product->id }}"
      >
        <!-- Collapsed View -->
        <template x-if="expanded !== {{ $product->id }}">
          <div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
              class="w-full h-48 object-cover rounded mb-3">
            <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
            <p class="text-red-600 font-bold">₱{{ number_format($product->price, 2) }}</p>
            <p class="text-sm text-gray-600 mb-2">👤 {{ $product->user->name ?? 'Unknown' }}</p>
            <p class="text-gray-700 text-sm">{{ Str::limit($product->description, 50) }}</p>
          </div>
        </template>

        <!-- Expanded View -->
        <template x-if="expanded === {{ $product->id }}">
  <div @click.stop>
    <div class="flex justify-between items-center mb-2">
      <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
      <button class="text-gray-500 hover:text-red-500 text-lg" @click.stop="expanded = null">✖</button>
    </div>

    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
      class="w-full h-64 object-cover rounded mb-4">

    <p class="text-red-600 text-lg font-bold mb-1">₱{{ number_format($product->price, 2) }}</p>
    <p class="text-sm text-gray-700 mb-2">👤 Seller: {{ $product->user->name ?? 'Unknown' }}</p>
    <p class="text-gray-800 mb-4">{{ $product->description }}</p>

    <!-- Message Form -->
    @if(auth()->id() !== $product->user_id)
      <form action="{{ route('chat.send') }}" method="POST" class="space-y-2">
          @csrf
          <input type="hidden" name="receiver_id" value="{{ $product->user_id }}">
          <input type="hidden" name="product_id" value="{{ $product->id }}">

          <textarea 
              name="message"
              rows="2"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200 text-sm"
              placeholder="Is this still available?"
              required
          ></textarea>

          <button 
              type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded text-sm font-medium hover:bg-blue-700 transition"
          >
              Send Message
          </button>
      </form>
    @endif
  </div>
</template>
      </div>
    @endforeach
  </section>
@endif
@endsection

@push('scripts')
<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
