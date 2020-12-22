<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBill extends Model
{
    protected $fillable = [
        'cust_id ', 'bill_num' , 'total' , 'pay' ,'total_profit','remain','date','notes','type','user_id'
    ];

    public function Employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function Customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'cust_id');
    }
}
