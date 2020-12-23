<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CustomerBill;
use App\Models\BillProduct;
use App\Models\Customer;
use Carbon\Carbon;
class CustBillsController extends Controller
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
        //
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
    public function store(Request $request){
        $data = $this->validate(\request(),
            [
                'bill_num' => 'required',
                'cust_id' => 'required|exists:customers,id'
            ]);
        $customer_bills = CustomerBill::all();
        if(count($customer_bills) == 0){
            $data['bill_num'] = 1;
        }else{
            $data['bill_num'] = $request->bill_num + 1;
        }
        $data['date'] = $this->today;
        $data['is_bill'] = 'y';
        $data['user_id'] = Auth::user()->id;
        CustomerBill::create($data);
        session()->flash('success', trans('admin.fatora_open_success'));
        return redirect(url('buy'));
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
