<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Inventario::all();
        return response()->json([
            'res'=>true,
            'Inventario: '=> Inventario::all()
        ]);
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
        $Inventario=new Inventario();
        // $Inventario->idUsInventario=$request->idUsInventario;
        // $Inventario->idobjetoInventario=$request->idobjetoInventario;
        // $Inventario->Cantidad=$request->Cantidad;
        $Inventario=Inventario::updateOrCreate(
            ['idUsInventario'=>$request->idUsInventario,
            'idobjetoInventario'=>$request->idobjetoInventario],
            ['Cantidad'=>$request->Cantidad]
        );
        return response()->json([
            "status"=>1,
            "msg"=>"inventario salvado exitosamente",
            "data"=>$Inventario
        ]);

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
        $inventario = Inventario::select("*")
        ->where("idUsInventario", "=", $id)
        ->get();


        return response()->json([
            "status"=>0,
            "msg"=>"Inventario del jugador",
            "data"=>$inventario
        ],200);
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
