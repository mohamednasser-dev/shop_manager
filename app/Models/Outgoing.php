<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    protected $fillable = [
        'name', 'cost', 'date', 'user_id'
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
