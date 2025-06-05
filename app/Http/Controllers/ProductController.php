<?php

namespace App\Http\Controllers;

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

        // Save product
        Product::create($validated);

        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }

    public function index()
{
    $products = Product::latest()->get(); // get all products, newest first
    return view('user_dashboard', compact('products'));
}
}
