<div x-data="{ confirmBuy: false }" class="p-4 mb-4 border rounded shadow bg-white">
    <p><strong>Product:</strong> {{ $tx->product->name }}</p>
    <p><strong>Seller:</strong> {{ $tx->seller->name }}</p>
    <p><strong>Buyer:</strong> {{ $tx->buyer->name }}</p>
    <p><strong>Status:</strong> 
        <span class="badge bg-{{ $tx->status == 'released' ? 'success' : ($tx->status == 'paid' ? 'warning' : 'secondary') }}">
            {{ ucfirst($tx->status) }}
        </span>
    </p>

    {{-- Buyer confirm intent to buy --}}
    @if (Auth::id() === $tx->buyer_id && $tx->status === 'pending')
        <button class="btn btn-sm btn-primary mt-2" @click="confirmBuy = !confirmBuy">
            Buy Now
        </button>

        <div x-show="confirmBuy" class="mt-2 p-3 bg-blue-50 rounded">
            <p class="text-sm mb-2">Are you sure you want to buy this item? This action cannot be undone.</p>
            <form method="POST" action="{{ route('transaction.confirm', $tx->id) }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-success">Yes, Confirm Purchase</button>
                <button type="button" class="btn btn-sm btn-secondary ml-2" @click="confirmBuy = false">Cancel</button>
            </form>
        </div>
    @endif

    {{-- Seller release button --}}
    @if (Auth::id() === $tx->seller_id && $tx->status == 'paid')
        <form method="POST" action="{{ route('transaction.release', $tx->id) }}">
            @csrf
            <button class="btn btn-sm btn-success mt-2">Release Escrow</button>
        </form>
    @endif
</div>
