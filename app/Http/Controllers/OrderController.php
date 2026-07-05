<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController 
{
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('shop.order-success', compact('order'));
    }
}