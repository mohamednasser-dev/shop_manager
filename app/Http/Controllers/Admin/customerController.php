<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\CustomerPayment;
use App\Models\CustomerBill;
use Illuminate\Http\Request;
use Exception;
use App\Models\Customer;
use Carbon\Carbon;

class customerController extends Controller
{
    public $today;

    public function __construct()
    {
        $mytime = Carbon::now();
        $this->today = Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
    }


    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customer.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account($id)
    {
        $customer = Customer::find($id);
        $customerBills = CustomerBill::where('cust_id', $id)->paginate(25);
        $total = CustomerBill::where('cust_id', $id)->sum('total');
        $pay = CustomerBill::where('cust_id', $id)->sum('pay');
        $remain = CustomerBill::where('cust_id', $id)->sum('remain');
        return view('admin.customer.customer_account', compact('customer', 'customerBills', 'total', 'remain', 'pay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:customers',
                'phone' => 'required|unique:customers',
                'address' => 'required',
            ]);
        $data['user_id'] = Auth::user()->id;
        $user = Customer::create($data);
        $user->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Customer::where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'bill_id' => 'required|exists:customer_bills,id',
                'cust_id' => 'required|exists:customers,id',
                'money' => 'required',
                'notes' => '',
            ]);
        $data['user_id'] = Auth::user()->id;
        $data['date'] = $this->today;
        $cust_payment = CustomerPayment::create($data);
        if ($cust_payment->save()) {
            $bill_id = $request->input('bill_id');
            $money = $request->input('money');
            $customerBills = CustomerBill::where('id', $bill_id)->first();
            $data_bill['remain'] = $customerBills->remain - $money;
            $data_bill['pay'] = $customerBills->pay + $money;

            $customerBills = CustomerBill::where('id', $bill_id)->update($data_bill);

        }
        session()->flash('success', trans('admin.payment_success'));
        return back();
    }

    public function manula_bill(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'remain' => 'required',
                'cust_id' => 'required',
                'notes' => ''
            ]);
        $data['user_id'] = Auth::user()->id;
        $data['date'] = $this->today;
        $data['total'] = $request->input('remain');
        CustomerBill::create($data);
        session()->flash('success', trans('admin.payment_success'));
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:suppliers,name,' . $request->id,
                'phone' => 'required|unique:suppliers,phone,' . $request->id,
                'address' => 'required',
            ]);
        $user = Customer::whereId($request->id)->update($data);
        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Customer::where('id', $id)->first();
        try {
            $user->delete();
            session()->flash('success', trans('admin.deleteSuccess'));
        } catch (Exception $exception) {
            session()->flash('danger', 'لا يمكن حذف العميل');
        }
        return back();
    }
}
