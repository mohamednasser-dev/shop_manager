<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Base;
class baseBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.base_bills.base_bills');
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
