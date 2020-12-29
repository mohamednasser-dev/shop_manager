<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerBill;
use App\Models\Outgoing;
use App\Models\SupplierPayment;
use Carbon\Carbon;

class IncomeController extends Controller
{
    public $today;

    public function __construct()
    {
        $mytime = Carbon::now();
        $this->today = Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
    }
    public function index()
    {
        $today = $this->today ;
        $customer_bills = CustomerBill::where('date', $today)->paginate(20);
        $outgoings = Outgoing::where('date', $today)->paginate(20);
        $supplierPayments = SupplierPayment::where('created_at', $today)->paginate(20);

        $total_pay =CustomerBill::where('date',$today)->sum('pay');
        $total_outgoing =Outgoing::where('date',$today)->sum('cost');
        $total_supplierPayment =SupplierPayment::where('created_at',$today)->sum('money');
        $remain = $total_pay - ($total_outgoing + $total_supplierPayment);

        return view('admin.income.income', compact('customer_bills' ,'outgoings','supplierPayments' ,'total_pay','total_outgoing','total_supplierPayment','remain','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
