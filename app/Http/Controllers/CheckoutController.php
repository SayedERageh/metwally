<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController 
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        return view('shop.checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:255',
            'notes'         => 'nullable|string|max:500',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart');
        }

        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        // إنشاء الطلب
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'notes'         => $request->notes,
            'total'         => $total,
            'status'        => 'pending',
        ]);

        // إضافة المنتجات
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'price'      => $item['price'],
                'quantity'   => $item['quantity'],
                'total'      => $item['price'] * $item['quantity'],
            ]);
        }

        // مسح السلة
        session()->forget('cart');

        return redirect()->route('order.show', $order);
    }
}