<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CustomerBill;
use App\Models\BillProduct;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Validator;
use Exception;
use DB;
class BuyController extends Controller
{
    public $today ;
    public function __construct(){
        //to get today date
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
    }

    public function index(){
        $today = $this->today;
        $products = Product::pluck('id', 'name');
        $products = json_encode($products);
        
        $customers = Customer::all();
        $customer_bills = CustomerBill::all();
        $bill_num = null;
        $customer_bills_selected = null;
        $customer_bills_products = null;

        if(count($customer_bills) == 0){
            $bill_num = 1 ;
        }else{
            $customer_bills_selected = CustomerBill::where('is_bill','y')->latest('bill_num')->first();
            $bill_num = $customer_bills_selected->bill_num ;
            $customer_bills_products = BillProduct::where('bill_id',$customer_bills_selected->id)->paginate(20);
        }
        return view('admin.buy.buy',compact('bill_num','customer_bills_selected','customers','products','customer_bills_products','today'));
    }

    function get_bill_product_data($bill_id){
        $bill_products = BillProduct::select('name','barcode','quantity','price','total')->where('bill_id',$bill_id)->get();
        return Datatables::of($bill_products)->make(true);
    }
    
    public function bill_design(){
        $today = $this->today;
        return view('admin.buy.bill_design',compact('today'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function live_search(Request $request)
    {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != null){
                $data = DB::table('products')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orWhere('barcode', 'like', '%'.$query.'%')
                    ->orderBy('name', 'desc')
                    ->get();
            }else{
                $data = null ;
            }
            if($data == null){
                $total_row = 0 ;
            }else{
                $total_row = $data->count();
            }
            if($total_row > 0){
                foreach($data as $row){
                    $output .= '
                    <tr>
                        <td class = "center" >'.$row->name.'</td>
                        <td class = "center" >'.$row->barcode.'</td>
                        <td class = "center" >'.$row->quantity.'</td>
                        <td class = "center" >'.$row->price.'</td>
                        <td class = "center" >
                            <a class="btn btn-success btn-circle" data-product-id="'.$row->id.'"  data-price="'.$row->price.'" data-quantity="'.$row->quantity.'" id="sale_btn" alt="default" data-toggle="modal" data-target="#sale-modal" >
                                <i class="fa fa-shopping-cart" ></i> 
                            </a></td>
                    </tr>
                    ';
                }
            }else{
                $output = '
                <tr>
                    <td align="center" colspan="5">'.trans('admin.no_data_found').'</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'product_id' => 'required',
            'bill_id'  => 'required',
            'date'  => 'required',
            'quantity'  => 'required',
            'price'  => 'required',
        ]);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()){
            foreach($validation->messages()->getMessages() as $field_name => $messages){
                $error_array[] = $messages;
            }
        }else{
            if($request->get('button_action') == "insert"){
                $total = $request->get('quantity') * $request->get('price') ;
                $product = Product::find($request->get('product_id'));
                $bill_Product = new BillProduct([
                    'name'    =>  $product->name,
                    'product_id'    =>  $request->get('product_id'),
                    'bill_id'     =>  $request->get('bill_id'),
                    'date'     =>  $request->get('date'),
                    'quantity'     =>  $request->get('quantity'),
                    'price'     =>  $request->get('price'),
                    'user_id'     =>  Auth::user()->id,
                    'total'     =>  $total
                ]);
                if($bill_Product->save()){
                    $product->quantity = $product->quantity - $request->get('quantity') ;
                    if($product->save()){
                        $cust_bill = CustomerBill::find($request->get('bill_id'));
                        $cust_bill->total = $cust_bill->total + $total ;
                        $cust_bill->remain = $cust_bill->remain + $total ;
                        $cust_bill->save();
                        session()->flash('success', trans('admin.added_bill_product'));
                        return back();
                    }
                }
                // $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
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
        $BillProduct = BillProduct::where('id', $id)->first();
        try {
            if($BillProduct->delete()){
                //reEnter Product back quantity ..
                $product = Product::find($BillProduct->product_id);
                $product->quantity = $product->quantity + $BillProduct->quantity;
                if($product->save()){
                    //update Bill total
                    $cust_bill = CustomerBill::find($BillProduct->bill_id);
                    $cust_bill->total = $cust_bill->total - $BillProduct->total ;
                    $cust_bill->remain = $cust_bill->remain - $BillProduct->total ;
                    $cust_bill->save();
                    session()->flash('success', trans('admin.deleteSuccess'));
                }
            }
        }catch(Exception $exception){
            session()->flash('danger', trans('admin.error'));
        }
        return back();
    }
}
