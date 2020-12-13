<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone','address', 'user_id'

    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
