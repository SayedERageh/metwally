<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController 
{
  public function index()
{
    $cart = session('cart', []);

    // لو الطلب AJAX → ارجع JSON
    if (request()->expectsJson()) {
        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
        return response()->json([
            'success' => true,
            'count'   => count($cart),
            'total'   => $total,
            'cart'    => array_values($cart),
        ]);
    }

    return view('shop.cart', compact('cart'));
}
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->images[0] ?? null,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return $this->cartResponse();
    }

    public function increase($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);

        return $this->cartResponse();
    }

    public function decrease($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return $this->cartResponse();
    }

    public function remove($id)
    {
        $cart = session('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return $this->cartResponse();
    }

    private function cartResponse()
    {
        $cart = session('cart', []);

        $total = collect($cart)
            ->sum(fn ($item) => $item['price'] * $item['quantity']);

        return response()->json([
            'success' => true,
            'count' => count($cart),
            'total' => $total,
            'cart' => array_values($cart),
        ]);
    }
}