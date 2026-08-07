<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController 
{
    public function index()
    {
        $products = Product::where('status', true)
            ->latest()
            ->paginate(12);

        return view('shop.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->take(4)
            ->get();

        return view('shop.show', compact(
            'product',
            'relatedProducts'
        ));
    }
}