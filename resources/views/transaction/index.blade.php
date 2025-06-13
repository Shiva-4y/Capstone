@extends('user_dashboard')

@section('content')
<div class="container">
    <h3 class="text-2xl font-bold mb-4">Your Transactions</h3>

    @forelse ($transactions as $tx)
        <div class="p-4 mb-4 border rounded shadow bg-white">
            <p><strong>Product:</strong> {{ $tx->product->name }}</p>
            <p><strong>Seller:</strong> {{ $tx->seller->name }}</p>
            <p><strong>Buyer:</strong> {{ $tx->buyer->name }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $tx->status == 'released' ? 'success' : ($tx->status == 'paid' ? 'warning' : 'secondary') }}">
                    {{ ucfirst($tx->status) }}
                </span>
            </p>

            @if (Auth::id() === $tx->seller_id && $tx->status == 'paid')
                <form method="POST" action="{{ route('transaction.release', $tx->id) }}">
                    @csrf
                    <button class="btn btn-sm btn-success mt-2">Release Escrow</button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-gray-500">No transactions yet.</p>
    @endforelse
</div>
@endsection
