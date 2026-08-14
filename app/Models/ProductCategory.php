<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(
            Product::class,
            'category_id'
        );
    }

    public function branches()
    {
        return $this->hasMany(
            Branch::class,
            'category_id'
        );
    }
}