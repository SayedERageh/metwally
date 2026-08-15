<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | الأقسام
        |--------------------------------------------------------------------------
        */

        $categories = ProductCategory::with([
            'branches' => function ($query) {
                $query->where('status', true)
                    ->orderBy('sort_order');
            }
        ])
        ->withCount([
            'products' => function ($query) {
                $query->where('status', true);
            }
        ])
        ->get();


        /*
        |--------------------------------------------------------------------------
        | المنتجات المميزة
        |--------------------------------------------------------------------------
        */

        $featuredProducts = Product::with([
            'category',
            'branch'
        ])
        ->where('status', true)
        ->where('is_featured', true)
        ->latest()
        ->take(8)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | أحدث المنتجات
        |--------------------------------------------------------------------------
        */

        $latestProducts = Product::with([
            'category',
            'branch'
        ])
        ->where('status', true)
        ->latest()
        ->take(8)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | المنتجات الجديدة
        |--------------------------------------------------------------------------
        */

        $newProducts = Product::with([
            'category',
            'branch'
        ])
        ->where('status', true)
        ->where('is_new', true)
        ->latest()
        ->take(8)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | المنتجات عليها عروض
        |--------------------------------------------------------------------------
        */

        $saleProducts = Product::with([
            'category',
            'branch'
        ])
        ->where('status', true)
        ->whereNotNull('sale_price')
        ->whereColumn('sale_price', '<', 'price')
        ->latest()
        ->take(8)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | الخدمات
        |--------------------------------------------------------------------------
        */

        $services = Service::latest()
            ->take(6)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | السلايدر
        |--------------------------------------------------------------------------
        */

        $sliders = Slider::where('active', true)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | الصفحة الرئيسية
        |--------------------------------------------------------------------------
        */

        return view('pages.home', compact(
            'categories',
            'featuredProducts',
            'latestProducts',
            'newProducts',
            'saleProducts',
            'services',
            'sliders'
        ));
    }
}