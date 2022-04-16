<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'produk_name',
        'price',
        'description',
        'product_rate',
        'stock',
        'weight',
        'foto',
    ];

    public function images() {
        return $this->hasMany('App\Models\ProdukImage', 'product_id');
    }
}