<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            //qué campos queremos validar
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
            //'password'=>'required|confirmed' //si quiero un cammpo donde se confirme la contraseña
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        //$user->password=$request->password;

        $user->password=Hash::make($request->password);//encripta la contraseña

        $user->save();
        return response()->json([
            "status"=>1,
            "msg"=>"Registro exitoso"
        ]);
    }
    public function login(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        $user=User::where("email","=",$request->email)->first();
        if(isset($user->id)){
            if(Hash::check($request->password,$user->password)){
                //creammos el token si esta todo bien
                $token=$user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status"=>1,
                    "msg"=>"Usuario logueado exitosamente",
                    "access_token"=>$token,
                    "Usuario"=>$user
                ]);
            }
            else{
                return response()->json([
                    "status"=>0,
                    "msg"=>"la password es incorrecta",
                ],404);
            }
        }
        else{
            return response()->json([
                "status"=>0,
                "msg"=>"Usuario no registrado",
            ],404);
        }
    }
    public function userProfile(){
        return response()->json([
            "status"=>0,
            "msg"=>"Acerca del perfil",
            "data"=>auth()->user()
        ],200);
    }
    public function logOut(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status"=>1,
            "msg"=>"Cierre de sesión",
        ]);
    }

}
