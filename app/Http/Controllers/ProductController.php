<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id')->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
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
        $data = new Product();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->status = $request->status;

        $post = $data->save();
        return response()->json([
            'status' => true,
            'msg' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {   
        $data = Product::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'Wrong id!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        $data = Product::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'msg' => 'Wrong id!'
            ], 404);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->status = $request->status;

        $post = $data->save();
        return response()->json([
            'status' => true,
            'msg' => 'Success'
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $data = Product::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'msg' => 'Wrong id!'
            ]);
        }
        $data->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Success delete data'
        ], 200);
    }
    public function search(String $str)
    {   
        $data = Product::select('*')->where('name', '=', $str)->orWhere('price', '=', $str)->orWhere('status', '=', $str)->get();
        if (!$data) {
            return response()->json([
                'status' => false,
                'msg' => 'Not Found'
            ], 404);
        }else {
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        }
    }
}
