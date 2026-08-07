<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;

class CartController
{
    protected CartService $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

public function miniCart()
{
    return view('shop.partials.mini-cart', [
        'cartItems' => $this->cart->getCart(),
        'cartTotal' => $this->cart->total(),
        'cartCount' => $this->cart->count(),
    ]);
}
public function data()
{
    return response()->json([
        'items' => array_values($this->cart->getCart()),
        'count' => $this->cart->count(),
        'total' => $this->cart->total(),
    ]);
}

    public function index()
    {
        return view('shop.cart', [
            'cart' => $this->cart->getCart(),
            'total' => $this->cart->total(),
        ]);
    }
public function add($id)
{
    $product = Product::findOrFail($id);

    $this->cart->add($product);

    return response()->json([
        'success' => true,
        'count'   => $this->cart->count(),
        'total'   => $this->cart->total(),
    ]);
}
    public function increase($id)
{
    $this->cart->increase($id);

    return response()->json([
        'success' => true
    ]);
}
   public function decrease($id)
{
    $this->cart->decrease($id);

    return response()->json([
        'success' => true
    ]);
}

public function remove($id)
{
    $this->cart->remove($id);

    return response()->json([
        'success' => true
    ]);
}
}