<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController 
{
    // صفحة جميع المنتجات
    public function products(Request $request)
    {
        $categories = ProductCategory::all();

        $products = Product::query();

        if ($request->category) {
            $products->where('category_id', $request->category);
        }

        $products = $products->latest()->get();

        return view('shop.products', compact('products', 'categories'));
    }

    // صفحة تفاصيل المنتج
    public function productDetails($id)
    {
        $product = Product::findOrFail($id);

        return view('shop.product-details', compact('product'));
    }
}