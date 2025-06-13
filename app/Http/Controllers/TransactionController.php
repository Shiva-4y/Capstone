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

        return view('transactions.index', compact('transactions'));
    }

    // Buy now
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
            'status' => 'pending', // waiting for payment / escrow hold
        ]);

        return back()->with('success', 'Transaction created. Waiting for payment...');
    }

    // Admin or system "releases" escrow payment to seller
    public function release($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Optional: only admin or seller can do this
        if ($transaction->status !== 'paid') {
            return back()->with('error', 'Payment not confirmed yet.');
        }

        $transaction->status = 'released';
        $transaction->save();

        return back()->with('success', 'Escrow released to seller.');
    }
    public function confirm($id)
{
    $transaction = Transaction::findOrFail($id);

    if ($transaction->buyer_id !== Auth::id()) {
        return back()->with('error', 'Unauthorized.');
    }

    if ($transaction->status !== 'pending') {
        return back()->with('info', 'This transaction is already in process.');
    }

    $transaction->status = 'paid'; // You could simulate "payment"
    $transaction->save();

    return back()->with('success', 'You have confirmed the purchase. Waiting for seller to release.');
}

}
