@extends('user_dashboard')


@section('content')
<h2 class="text-2xl font-bold text-red-600 mb-6">🛒 Your Cart</h2>

@if(session('success'))
  <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
@endif

@if(count($cart) === 0)
  <p class="text-gray-600">Your cart is empty.</p>
@else
  @php $total = 0; @endphp
  <div class="space-y-4">
    @foreach ($cart as $item)
      @php $total += $item['price']; @endphp
      <div class="flex items-center justify-between p-4 bg-white rounded border shadow-sm">
        <div class="flex items-center gap-4">
          <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 object-cover rounded" />
          <div>
            <h3 class="font-bold">{{ $item['name'] }}</h3>
            <p class="text-red-600 font-semibold">₱{{ number_format($item['price'], 2) }}</p>
          </div>
        </div>
        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
          @csrf
          <button class="text-red-500 hover:underline">Remove</button>
        </form>
      </div>
    @endforeach
  </div>

  <div class="text-right mt-6 text-xl font-bold text-gray-800">
    Total: ₱{{ number_format($total, 2) }}
  </div>

  <div class="text-right mt-4">
    <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
      Proceed to Checkout
    </button>
  </div>
@endif
@endsection
