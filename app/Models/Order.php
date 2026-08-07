<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number',         'first_name',         'last_name',         'email',         'phone',         'country',         'governorate',         'city',         'area',         'address',         'postal_code',         'subtotal',         'shipping',         'discount',         'total',         'payment_method',         'payment_image',         'notes',         'status',];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
