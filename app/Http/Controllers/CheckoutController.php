<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingRate;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController 
{

    public function index(CartService $cart)
    {

        $cartItems = $cart->getCart();

        if(empty($cartItems)){
            return redirect('/cart');
        }


        return view('shop.checkout', [

            'cartItems' => $cartItems,

            'subtotal' => $cart->total(),

            'shippingRates' => ShippingRate::all(),

        ]);

    }


public function store(Request $request, CartService $cart)
{

    $request->validate([

        'first_name'=>'required',
        'phone'=>'required',
        'governorate'=>'required',
        'city'=>'required',
        'address'=>'required',
        'payment_method'=>'required',

    ]);



    $cartItems = $cart->getCart();


    if(empty($cartItems)){

        return redirect('/cart');

    }



    DB::beginTransaction();



    try {



        $shipping = $request->shipping ?? 0;


        $subtotal = $cart->total();


        $total = $subtotal + $shipping;



        // إنشاء رقم الطلب

        $orderNumber = 
        'MTW-'.date('Ymd').'-'.str_pad(
            Order::count()+1,
            6,
            '0',
            STR_PAD_LEFT
        );




        // رفع صورة التحويل

        $paymentImage = null;


        if($request->hasFile('payment_image')){


            $paymentImage = 
            $request->file('payment_image')
            ->store('orders/payments','public');


        }





        // إنشاء الطلب

        $order = Order::create([


            'order_number'=>$orderNumber,


            'first_name'=>$request->first_name,

            'last_name'=>$request->last_name,


            'email'=>$request->email,


            'phone'=>$request->phone,


'country'      => 'مصر',
'governorate'  => $request->governorate,

            'city'=>$request->city,


            'area'=>$request->area,


            'address'=>$request->address,


            'postal_code'=>$request->postal_code,



            'subtotal'=>$subtotal,


            'shipping'=>$shipping,


            'discount'=>0,


            'total'=>$total,



            'payment_method'=>$request->payment_method,


            'payment_image'=>$paymentImage,


            'status'=>'pending',


        ]);





        // حفظ المنتجات


        foreach($cartItems as $item){


            OrderItem::create([


                'order_id'=>$order->id,


                'product_id'=>$item['id'],


                'product_name'=>$item['name'],


                'price'=>$item['price'],


                'quantity'=>$item['quantity'],


                'total'=>
                $item['price'] * $item['quantity'],


            ]);

        }




        DB::commit();



        // تفريغ السلة

        $cart->clear();



        return redirect()
        ->route('checkout.success',$order);



    } catch(\Exception $e){



        DB::rollBack();
dd($e->getMessage());

        return back()
        ->with('error',$e->getMessage());


    }


}
public function success(Order $order)
{
    return view('shop.success', compact('order'));
}

}