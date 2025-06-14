<!-- Buyer: Mark as Paid -->
@if(Auth::id() === $tx->buyer_id && $tx->status === 'pending')
    <form method="POST" action="{{ route('transaction.markPaid', $tx->id) }}">
        @csrf
        <button class="btn btn-warning mt-2">Mark as Paid</button>
    </form>
@endif

<!-- Seller: Release -->
@if(Auth::id() === $tx->seller_id && $tx->status === 'paid')
    <form method="POST" action="{{ route('transaction.release', $tx->id) }}">
        @csrf
        <button class="btn btn-success mt-2">Release Product</button>
    </form>
@endif

<!-- Buyer: Complete -->
@if(Auth::id() === $tx->buyer_id && $tx->status === 'released')
    <form method="POST" action="{{ route('transaction.complete', $tx->id) }}">
        @csrf
        <button class="btn btn-primary mt-2">Mark as Received</button>
    </form>
@endif

<!-- Buyer or Seller: Cancel -->
@if(in_array($tx->status, ['pending', 'paid']) && (Auth::id() === $tx->buyer_id || Auth::id() === $tx->seller_id))
    <form method="POST" action="{{ route('transaction.cancel', $tx->id) }}">
        @csrf
        <input type="text" name="cancel_reason" required class="form-control my-2" placeholder="Reason for cancellation">
        <button class="btn btn-danger btn-sm">Cancel</button>
    </form>
@endif
