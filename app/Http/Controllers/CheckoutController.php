<?php

namespace App\Http\Controllers;
use App\Models\Governorate;
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

    if (empty($cartItems)) {
        return redirect('/cart');
    }

    return view('shop.checkout', [
        'cartItems' => $cartItems,
        'subtotal' => $cart->total(),
        'governorates' => Governorate::where('is_active', true)
            ->with(['cities' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('name');
            }])
            ->orderBy('name')
            ->get(),
    ]);
}


public function store(Request $request, CartService $cart)
{

$request->validate([
    'first_name' => 'required|string|max:100',
    'last_name' => 'nullable|string|max:100',
    'phone' => 'required|string|max:30',
    'email' => 'nullable|email|max:150',

    'governorate' => 'required|exists:governorates,id',
    'city' => 'required|exists:cities,id',

    'area' => 'nullable|string|max:150',
    'address' => 'required|string|max:500',
    'postal_code' => 'nullable|string|max:20',

    'payment_method' => 'required|in:cash_on_delivery,vodafone_cash,instapay',

    'payment_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
]);



    $cartItems = $cart->getCart();


    if(empty($cartItems)){

        return redirect('/cart');

    }



    DB::beginTransaction();



    try {



$governorate = Governorate::where('id', $request->governorate)
    ->where('is_active', true)
    ->firstOrFail();

$city = $governorate->cities()
    ->where('id', $request->city)
    ->where('is_active', true)
    ->firstOrFail();

$shipping = $governorate->shipping_price;

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
'governorate' => $governorate->name,

'city' => $city->name,


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