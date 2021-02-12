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
    public function __construct()
    {
        $this->middleware(['permission:products']);
    }
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
                'image' => 'sometimes|nullable',
                'barcode' => 'required|unique:products',
//                'alarm_quantity' => 'required',
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
        if($request->image != null){

            $data['image'] = $this->MoveImage($request->image);
        }
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

    public function MoveImage($request_file)
    {
        // This is Image Information ...
        $file = $request_file;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Move Image To Folder ..
        $fileNewName = 'file' . $size . '_' . time() . '.' . $ext;
        $file->move(public_path('uploads/products'), $fileNewName);

        return $fileNewName;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->validate(\request(),
            [
                'quantity' => 'required|numeric',
                'id' => 'required',

            ]);
        $product_bases = ProductBase::where('product_id', $request->id)->get();
        foreach ($product_bases as $product_base) {
            $base = Base::whereId($product_base->base_id)->first();
            $total_base_Quantity = $product_base->quantity * $request->quantity;
            if ($total_base_Quantity > $base->quantity) {
                session()->flash('danger', 'كميه ال ' . $base->name . 'لا تكفي');
                return redirect(url('products'));
            }
        }

        foreach ($product_bases as $product_base) {
            $base = Base::whereId($product_base->base_id)->first();
            $total_base_Quantity = $product_base->quantity * $request->quantity;
            $base->quantity = $base->quantity - $total_base_Quantity;
            $base->save();
        }
        $product = Product::whereId($request->id)->first();
        $product->quantity = $product->quantity + $request->quantity;
        $product->save();
        session()->flash('success', 'تم اضافه الكميه والخصم من الخام بنجاح!');
        return redirect(url('products'));
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
                'barcode' => 'required|unique:products,barcode,' . $id,
                'image' => 'sometimes|nullable',
//                'alarm_quantity' => 'required',
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
        if ($request->image != null) {
            $data['image'] = $this->MoveImage($request->image);

        }
//        $data['quantity'] = 0;
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
