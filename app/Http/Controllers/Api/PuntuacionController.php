<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\puntuacion;
use Illuminate\Support\Facades\DB;

class PuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Puntuacion::all();
        return response()->json([
            'res'=>true,
            'Puntuaciones: '=> Puntuacion::all()
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
        $puntuacion=new Puntuacion();
        $puntuacion->Puntuacion=$request->Puntuacion;
        $puntuacion->idUsMakePuntuacion =$request->idUsMakePuntuacion;
        $puntuacion->save();
        return response()->json([
            "status"=>1,
            "msg"=>"Puntuación guarda exitosamente"
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
    public function showPuntuacionesFromUserId($id){
        //$puntuaciones=Puntuacion::where('idUsMakePuntuacion',3)->first();
        // $puntuaciones = DB::table('puntuaciones')
        // ->where('idUsMakePuntuacion', $id);

        //$puntuaciones = DB::table('puntuaciones')->get();
        // $puntuaciones = DB::table('puntuaciones')
        // ->where('idUsMakePuntuacion', $id)->get();

        $puntuaciones = Puntuacion::select("*")
        ->where("idUsMakePuntuacion", "=", $id)
        ->get();


        return response()->json([
            "status"=>0,
            "msg"=>"Acerca del perfil",
            "data"=>$puntuaciones
        ],200);
    }
}
