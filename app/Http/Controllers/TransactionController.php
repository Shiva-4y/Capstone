<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Product $product)
    {
        if ($product->user_id === Auth::id()) {
    return back()->with('error', 'You cannot buy your own product.');
}

$alreadyBought = Transaction::where('product_id', $product->id)
    ->where('buyer_id', Auth::id())
    ->exists();

Transaction::create([
    'product_id' => $product->id,
    'buyer_id' => Auth::id(),
    'product_name' => $product->name,
]);


        return redirect('/marketplace')->with('success', 'Product added to cart!');
    }
}
