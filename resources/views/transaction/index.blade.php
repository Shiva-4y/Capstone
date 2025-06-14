@extends('user_dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-red-600">🧾 Order History</h1>

@forelse ($transactions as $tx)
<div class="bg-white shadow-md rounded-xl p-6 mb-6 border border-gray-200">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-xl font-semibold text-gray-800">🛍️ {{ $tx->product->name }}</h2>
        <span class="px-3 py-1 text-sm rounded-full 
            @if($tx->status === 'pending') bg-yellow-100 text-yellow-800
            @elseif($tx->status === 'paid') bg-blue-100 text-blue-800
            @elseif($tx->status === 'released') bg-purple-100 text-purple-800
            @elseif($tx->status === 'completed') bg-green-100 text-green-800
            @elseif($tx->status === 'cancelled') bg-red-100 text-red-800
            @endif">
            {{ ucfirst($tx->status) }}
        </span>
    </div>

    <div class="text-sm text-gray-600 mb-4">
        <p><strong>Buyer:</strong> {{ $tx->buyer->name }}</p>
        <p><strong>Seller:</strong> {{ $tx->seller->name }}</p>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-2 sm:space-y-0">
        {{-- Buyer: Mark as Paid --}}
        @if(Auth::id() === $tx->buyer_id && $tx->status === 'pending')
            <form method="POST" action="{{ route('transaction.markPaid', $tx->id) }}">
                @csrf
                <button class="bg-yellow-400 text-white font-medium px-4 py-2 rounded hover:bg-yellow-500 transition">
                    💰 Mark as Paid
                </button>
            </form>
        @endif

        {{-- Seller: Release --}}
        @if(Auth::id() === $tx->seller_id && $tx->status === 'paid')
            <form method="POST" action="{{ route('transaction.release', $tx->id) }}">
                @csrf
                <button class="bg-blue-500 text-white font-medium px-4 py-2 rounded hover:bg-blue-600 transition">
                    📦 Release Product
                </button>
            </form>
        @endif

        {{-- Buyer: Complete --}}
        @if(Auth::id() === $tx->buyer_id && $tx->status === 'released')
            <form method="POST" action="{{ route('transaction.complete', $tx->id) }}">
                @csrf
                <button class="bg-green-500 text-white font-medium px-4 py-2 rounded hover:bg-green-600 transition">
                    ✅ Mark as Received
                </button>
            </form>
        @endif

        {{-- Cancel --}}
        @if(in_array($tx->status, ['pending', 'paid']) && (Auth::id() === $tx->buyer_id || Auth::id() === $tx->seller_id))
            <form method="POST" action="{{ route('transaction.cancel', $tx->id) }}" class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
                @csrf
                <input type="text" name="cancel_reason" required class="border rounded px-3 py-1 text-sm" placeholder="Reason for cancellation">
                <button class="bg-red-500 text-white font-medium px-4 py-2 mt-2 sm:mt-0 rounded hover:bg-red-600 transition">
                    ❌ Cancel
                </button>
            </form>
        @endif
    </div>
</div>
@empty
<p class="text-gray-500 text-lg">You have no transactions yet.</p>
@endforelse
@endsection
