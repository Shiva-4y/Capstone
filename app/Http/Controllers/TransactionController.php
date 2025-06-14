<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
     public function index()
    {
        $userId = Auth::id();
        $transactions = Transaction::where('buyer_id', $userId)
            ->orWhere('seller_id', $userId)
            ->with(['product', 'buyer', 'seller'])
            ->latest()
            ->get();

        return view('transaction.index', compact('transactions'));
    }

    // Buyer initiates transaction
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->user_id == Auth::id()) {
            return back()->with('error', 'You cannot buy your own product.');
        }

        $existing = Transaction::where('buyer_id', Auth::id())
            ->where('product_id', $productId)
            ->whereIn('status', ['pending', 'paid'])
            ->first();

        if ($existing) {
            return back()->with('info', 'Transaction already exists.');
        }

        Transaction::create([
            'buyer_id' => Auth::id(),
            'seller_id' => $product->user_id,
            'product_id' => $productId,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Transaction created. Waiting for payment...');
    }

    // Buyer marks as paid
    public function markAsPaid($id)
    {
        $tx = Transaction::findOrFail($id);

        if ($tx->buyer_id !== Auth::id() || $tx->status !== 'pending') {
            abort(403);
        }

        $tx->status = 'paid';
        $tx->save();

        return back()->with('success', 'Marked as paid. Waiting for seller.');
    }

    // Seller releases item
    public function release($id)
    {
        $tx = Transaction::findOrFail($id);

        if ($tx->seller_id !== Auth::id() || $tx->status !== 'paid') {
            abort(403);
        }

        $tx->status = 'released';
        $tx->save();

        return back()->with('success', 'Product released to buyer.');
    }

    // Buyer completes transaction
    public function complete($id)
    {
        $tx = Transaction::findOrFail($id);

        if ($tx->buyer_id !== Auth::id() || $tx->status !== 'released') {
            abort(403);
        }

        $tx->status = 'completed';
        $tx->save();

        return back()->with('success', 'Transaction completed successfully.');
    }

    // Cancel transaction (buyer or seller)
    public function cancel(Request $request, $id)
    {
        $tx = Transaction::findOrFail($id);

        if ($tx->buyer_id !== Auth::id() && $tx->seller_id !== Auth::id()) {
            abort(403);
        }

        if (!in_array($tx->status, ['pending', 'paid'])) {
            return back()->with('error', 'Cannot cancel at this stage.');
        }

        $request->validate([
            'cancel_reason' => 'required|string|max:255',
        ]);

        $tx->status = 'cancelled';
        $tx->cancel_reason = $request->cancel_reason;
        $tx->save();

        return back()->with('success', 'Transaction cancelled.');
    }

public function sellerOrders()
{
    $transactions = Transaction::where('seller_id', Auth::id())
        ->with(['product', 'buyer'])
        ->latest()
        ->get();

    return view('transactions.seller_orders', compact('transactions'));
}


}
