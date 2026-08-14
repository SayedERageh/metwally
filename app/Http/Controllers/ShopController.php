<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Branch;

class ShopController
{
    /*
    |--------------------------------------------------------------------------
    | Shop
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::with([
            'category',
            'branch'
        ])
            ->where('status', true)
            ->latest()
            ->paginate(12);

        $categories = ProductCategory::with([
            'branches' => function ($query) {
                $query->where('status', true)
                    ->orderBy('sort_order');
            }
        ])
            ->withCount('products')
            ->get();

        return view('shop.index', compact(
            'products',
            'categories'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    public function category($id)
    {
        $category = ProductCategory::with([
            'branches' => function ($query) {
                $query->where('status', true)
                    ->orderBy('sort_order');
            }
        ])->findOrFail($id);


        $products = Product::with([
            'category',
            'branch'
        ])
            ->where('category_id', $category->id)
            ->where('status', true)
            ->latest()
            ->paginate(12);


        return view(
            'shop.category',
            compact(
                'category',
                'products'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Branch
    |--------------------------------------------------------------------------
    */

    public function branch($categoryId, $branchId)
    {
        $category = ProductCategory::findOrFail(
            $categoryId
        );


        $branch = Branch::where('id', $branchId)
            ->where('category_id', $category->id)
            ->where('status', true)
            ->firstOrFail();


        $products = Product::with([
            'category',
            'branch'
        ])
            ->where('category_id', $category->id)
            ->where('branch_id', $branch->id)
            ->where('status', true)
            ->latest()
            ->paginate(12);


        return view(
            'shop.branch',
            compact(
                'category',
                'branch',
                'products'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $product = Product::with([
            'category',
            'branch'
        ])->findOrFail($id);


        $relatedProducts = Product::with([
            'category',
            'branch'
        ])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();


        return view(
            'shop.show',
            compact(
                'product',
                'relatedProducts'
            )
        );
    }
}