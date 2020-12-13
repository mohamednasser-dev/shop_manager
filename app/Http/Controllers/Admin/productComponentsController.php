<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Base;
use App\Models\Product;
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
                'name' => 'required|unique:bases',
                'barcode' => 'required',
                'alarm_quantity' => 'required',
                'price' => 'required',
                'total_cost' => 'required|unique:bases',
                'gomla_percent' => 'required',
                'part_percent' => 'required',
                'category_id' => 'required',
//                for pivot
                'quantity' => 'required',
                'base_id' => 'required',

            ]);
        $data['user_id'] = Auth::user()->id;
        $data['quantity'] = 0;
        $product = Product::create($data);
        foreach ($request->rows as $row) {

        }
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect(url('bases'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
