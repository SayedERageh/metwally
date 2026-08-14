<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(
            ProductCategory::class,
            'category_id'
        );
    }

    public function products()
    {
        return $this->hasMany(
            Product::class,
            'branch_id'
        );
    }
}