<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

            'name', 'barcode', 'quantity', 'alarm_quantity', 'price', 'total_cost', 'gomla_percent', 'part_percent', 'category_id', 'user_id'
    ];
    public function Category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function Bases()
    {
        return $this->belongsToMany(Base::class, 'product_bases', 'product_id', 'base_id');
    }
}
