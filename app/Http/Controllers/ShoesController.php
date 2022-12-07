<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoes;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoes::all();
        return $shoes;
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
        $table = shoes::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "stock" => $request->stock
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Sepatu tersimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shoes = shoes::find($id);
        if ($shoes) {
            return response()->json([
                'status' => 200,
                'data' => $shoes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'ID ' . $id . ' tidak ditemukan'
            ], 404);
        }
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
        $shoes = Shoes::find($id);
        if($shoes){
            $shoes->name = $request->name ? $request->name : $shoes->name;
            $shoes->price = $request->price ? $request->price : $shoes->price;
            $shoes->description = $request->description ? $request->description : $shoes->description;
            $shoes->stock = $request->stock ? $request->stock : $shoes->stock;
            $shoes->save();
            return response()->json([
                'status' => 200,
                'data' => $shoes
            ], 200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . ' tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shoes = Shoes::where('id',$id)->first();
        if($shoes){
            $shoes->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'shoes successfully erased',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ]);
        }
    }
}
