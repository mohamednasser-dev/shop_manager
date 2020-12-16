<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SupplierBillBase;
use App\Models\SupplierSale;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Base;
use Carbon\Carbon;
class baseBillsController extends Controller
{
    public $today ;
    public function __construct()
    {
        //to get today date
        $mytime = Carbon::now();
        $this->today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
    }
    public function index()
    {
        $suppliers = Supplier::all();
        $supplier_sales = SupplierSale::all();
        if(count($supplier_sales) == 0){
            $bill_num = 1 ;
             $supplier_sales_selected = null;
            return view('admin.base_bills.base_bills',compact('bill_num','supplier_sales_selected','suppliers'));
        }else{
            $supplier_sales_selected = SupplierSale::where('is_bill','y')->latest('bill_num')->first();
            $bill_num = $supplier_sales_selected->bill_num ;
            return view('admin.base_bills.base_bills',compact('bill_num','supplier_sales_selected','suppliers'));
        }
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
        
        $data = $this->validate(\request(),
            [
                'bill_num' => 'required',
                'supplier_id' => 'required|exists:suppliers,id'
            ]);
        $supplier_sales = SupplierSale::all();
        if(count($supplier_sales) == 0){
            $data['bill_num'] = 1;
        }else{
            $data['bill_num'] = $request->bill_num + 1;
        }
        $data['date'] = $this->today;
        $data['is_bill'] = 'y';
        $data['user_id'] = Auth::user()->id;
        SupplierSale::create($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('base_bills'));
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

    public function dataAjax(Request $request){
        $data = Supplier::select("id", "name")->get();

        if ($request->has('q')) {
            $search = $request->q;
            $data = Supplier
                ::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
    public function dataAjax_base(Request $request){
        $data = Base::select("id", "name")->get();

        if ($request->has('q')) {
            $search = $request->q;
            $data = Base
                ::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }
    public function store_base_bill(Request $request){
        $array1 = explode('&', $request->inputs);
        $inputs = [];
        foreach ($array1 as $value) {
            $input = explode('=', $value);
            $inputs [$input[0]] = $input[1];
        }
        $base = Base::find($inputs['base_id']);
        $inputs['name'] =  $base->name;
        $inputs['date'] = $this->today ;
        $inputs['total'] =  $inputs['quantity'] * $inputs['purchas_price'] ;
        $player = SupplierBillBase::create($inputs);
        return view('admin.base_bills.base_bills'); 
    }
}
