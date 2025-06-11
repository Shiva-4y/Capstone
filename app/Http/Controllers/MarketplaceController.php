<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class MarketplaceController extends Controller
{
public function index()
{
  $products = Product::where('user_id', '!=', Auth::id())
                   ->where('is_sold', false)
                   ->latest()
                   ->get();


    return view('marketplace.index', compact('products'));
}}
