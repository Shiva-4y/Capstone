<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;  // assuming you have a Product model

class ProductController extends Controller
{
    // Show the add product form
    public function create()
    {
        return view('crud.AddProduct');  // your blade file
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
   $validated['user_id'] = Auth::id();
        // Save product
        Product::create($validated);

        return redirect('/user_dashboard')->with('success', 'Product added successfully!');
    }

public function edit(Product $product)
{
    // Optional: authorize user owns this product
    if ($product->user_id !== Auth::id()) {
        abort(403);
    }

    return view('crud.EditProduct', compact('product'));
}

public function update(Request $request, Product $product)
{
    if ($product->user_id !== Auth::id()) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        // Optionally: delete old image file here if exists

        $imagePath = $request->file('image')->store('products', 'public');
        $validated['image'] = $imagePath;
    }

    $product->update($validated);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

public function destroy(Product $product)
{
    if ($product->user_id !== Auth::id()) {
        abort(403);
    }

    // Optionally: delete image file here

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
}

    public function index()
{
       $products = Product::where('user_id', Auth::id())->latest()->get(); // Only user's products
    return view('products', compact('products')); 
}
}
