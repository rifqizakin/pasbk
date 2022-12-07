<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jacket;

class JacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jacket = Jacket::all();
        return $jacket;
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
        $table = jacket::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "stock" => $request->stock
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Jaket tersimpan',
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
        $shoes = jacket::find($id);
        if ($shoes) {
            return response()->json([
                'status' => 200,
                'data' => $shoes
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'ID ' . $id . ' Jaket Ga ada'
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
        $jacket = Jacket::find($id);
        if($jacket){
            $jacket->name = $request->name ? $request->name : $jacket->name;
            $jacket->price = $request->price ? $request->price : $jacket->price;
            $jacket->description = $request->description ? $request->description : $jacket->description;
            $jacket->stock = $request->stock ? $request->stock : $jacket->stock;
            $jacket->save();
            return response()->json([
                'status' => 200,
                'data' => $jacket
            ], 200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id . ' Ga ada Jacket'
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
        $shoes = Jacket::where('id',$id)->first();
        if($shoes){
            $shoes->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Jacket Berhasil Di Hapus',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' Ga Ada Cuy'
            ]);
        }
    }
}
