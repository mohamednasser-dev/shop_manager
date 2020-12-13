<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Base;
use Carbon\Carbon;
use App\Models\SupplierBillBase;
use App\Models\SupplierSale;
use Illuminate\Support\Facades\Auth;
class baseBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $supplier_sales = SupplierSale::all();
        if(count($supplier_sales) == 0){
            $bill_num = 1 ;
             $supplier_sales_selected = null;
            return view('admin.base_bills.base_bills',compact('bill_num','supplier_sales_selected','suppliers'));
        }else{
            $supplier_sales_selected = SupplierSale::latest('bill_num')->first();
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
        //to get today date
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d H:i');
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
        $data['date'] = $today;
        $data['user_id'] = Auth::user()->id;
        SupplierSale::create($data);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('base_bills'));
    }

    public function store_bill_base(Request $request)
    {
        //to get today date
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d H:i');
            $data = $this->validate(request(), [
                'supplier_sale_id' => 'required|exists:supplier_sales,id',
                'supplier_id' => 'required|exists:suppliers,id',
                'base_id' => 'required|exists:bases,id',
                'quantity' => 'required',
                'price' => 'required',
            ]);
            $data['date'] = $today;
            $data['user_id'] = Auth::user()->id;
        
        SupplierBillBase::create($data);
        return response()->json(['success' => trans('site_lang.addedsuccess')]);
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
}
