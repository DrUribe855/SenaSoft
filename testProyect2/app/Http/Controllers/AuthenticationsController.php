<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthenticationsController extends Controller
{
    

    public function login(LoginFormRequest $request ){
        //Login personalizado
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], false)){
            return response()->json('Has iniciado sesion', 200);
        }else{
            return response()->json(['errors' => ['login' => ['Los datos que ingresaste son incorrectos']]], 422);
        }

    }
}
