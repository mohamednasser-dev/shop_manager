<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    public function my_orders(){
        return view('front.cust_home');
    } 

    public function logout(){
    	\Auth::guard('customer')->logout();
        return view('front.home');
    }
}
