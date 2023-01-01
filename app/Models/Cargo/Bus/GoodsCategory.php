<?php

namespace App\Models\Cargo\Bus;

use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    protected $table = 'goods_category_bus';
    protected $fillable = ['category', 'name', 'pickup', 'dropoff', 'price'];
}
