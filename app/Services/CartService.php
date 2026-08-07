<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function getCart()
    {
        return session()->get('cart', []);
    }

    public function add(Product $product)
    {
        $cart = $this->getCart();

        if (isset($cart[$product->id])) {

            $cart[$product->id]['quantity']++;

        } else {

            $cart[$product->id] = [

                'id' => $product->id,

                'name' => $product->name,

                'price' => $product->sale_price ?: $product->price,

                'image' => $product->images[0] ?? null,

                'quantity' => 1,

            ];
        }

        session()->put('cart', $cart);

        return $cart;
    }

    public function remove($id)
    {
        $cart = $this->getCart();

        unset($cart[$id]);

        session()->put('cart', $cart);
    }

    public function increase($id)
    {
        $cart = $this->getCart();

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        }

        session()->put('cart', $cart);
    }

    public function decrease($id)
    {
        $cart = $this->getCart();

        if (! isset($cart[$id])) {
            return;
        }

        if ($cart[$id]['quantity'] > 1) {

            $cart[$id]['quantity']--;

        } else {

            unset($cart[$id]);

        }

        session()->put('cart', $cart);
    }

    public function total()
    {
        return collect($this->getCart())->sum(function ($item) {

            return $item['price'] * $item['quantity'];

        });
    }

    public function count()
    {
        return collect($this->getCart())->sum('quantity');
    }

    public function clear()
    {
        session()->forget('cart');
    }
}