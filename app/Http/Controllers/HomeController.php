<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();

        $categories = ProductCategory::all();

        $sliders = Slider::where('active', true)
            ->latest()
            ->get();

        return view('pages.home', compact(
            'services',
            'categories',
            'sliders'
        ));
    }
}