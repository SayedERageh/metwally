<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'branch_id',
        'category_id',
        'name',
        'description',
        'price',
        'sale_price',
        'quantity',
        'images',
        'slug',
        'is_new',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'is_new' => 'boolean',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}