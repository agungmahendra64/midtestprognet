<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'product_categories';
    protected $fillable = [
        'category_name',
        'description',
    ];

}