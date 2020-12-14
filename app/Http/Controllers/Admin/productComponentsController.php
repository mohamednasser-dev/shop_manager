<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Base;
use App\Models\Product;
use App\Models\ProductBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.productsCompnents.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bases = Base::pluck('id', 'name');
        $bases = json_encode($bases);

        return view('admin.productsCompnents.create', compact('bases'));

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
                'name' => 'required|unique:products',
                'barcode' => 'required',
                'alarm_quantity' => 'required',
                'price' => 'required',
                'total_cost' => 'required',
                'gomla_percent' => 'required',
                'part_percent' => 'required',
                'category_id' => 'required',
//                for pivot
                'quantity*' => 'required',
                'base_id*' => 'required',

            ]);
        $data['user_id'] = Auth::user()->id;
        $data['quantity'] = 0;
        $data['total_cost'] = 0;
        $product = Product::create($data);
        foreach ($request->rows as $row) {
            if ($row['base_id'] != null && $row['quantity'] != null) {

                $row['product_id'] = $product->id;
                ProductBase::create($row);
            }
        }
        $base_products = ProductBase::where('product_id', $product->id)->get();
        $total_cost = 0;
        foreach ($base_products as $base_product) {
            $base = Base::where('id', $base_product->base_id)->first();
            $total_cost = $total_cost + $base->price * $base_product->quantity;

        }
        $product = Product::where('id', $product->id)->update(['total_cost' => $total_cost]);
//        $product->total_cost = $total_cost;
//        $product->save();
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('products'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->with('Bases')->first();

        $bases = Base::pluck('id', 'name');
        $bases = json_encode($bases);
        $product_base = ProductBase::where('product_id', $id)->get();
//        $product_base = json_encode($product_base);

        return view('admin.productsCompnents.edit', compact('bases', 'product', 'product_base'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(\request(),
            [
                'name' => 'required|unique:products,name,' . $id,
                'barcode' => 'required',
                'alarm_quantity' => 'required',
                'price' => 'required',
                'total_cost' => 'required',
                'gomla_percent' => 'required',
                'part_percent' => 'required',
                'category_id' => 'required',
//                for pivot
                'quantity*' => 'required',
                'base_id*' => 'required',

            ]);
        $data['user_id'] = Auth::user()->id;
        $data['quantity'] = 0;
        $product = Product::whereId($id)->update($data);
        ProductBase::where('product_id', $id)->delete();
        foreach ($request->rows as $row) {
            if ($row['base_id'] != null && $row['quantity'] != null) {
                $row['product_id'] = $id;
                ProductBase::create($row);
            }
        }
        $base_products = ProductBase::where('product_id', $id)->get();
        $total_cost = 0;
        foreach ($base_products as $base_product) {
            $base = Base::where('id', $base_product->base_id)->first();
            $total_cost = $total_cost + $base->price * $base_product->quantity;

        }
        $product = Product::where('id', $id)->update(['total_cost' => $total_cost]);

        session()->flash('success', trans('admin.updatSuccess'));
        return redirect(url('products'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Product::where('id', $id)->first();
        try {
            $user->delete();
            session()->flash('success', trans('admin.deleteSuccess'));
        } catch (Exception $exception) {
            session()->flash('danger', '!لا يمكن حذف المنتج');
        }
        return back();
    }

}
