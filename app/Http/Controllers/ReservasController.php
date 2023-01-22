<?php

namespace App\Http\Controllers;
use Lean\ConsoleLog\ConsoleLog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeCamper;
use App\Models\User;
use App\Models\Reservas;

class ReservasController extends Controller
{
    use ConsoleLog;
    //Generar reserva 
    public function store(Request $request)
    {
        $id = $request->id;
        return view('reservar', [
            'homecamper' => HomeCamper::findOrFail($id)
        ]);
    }

    use ConsoleLog;
    //Generar reserva 
    public function create(Request $request)
    {
        $id = $request->id;
        return view('ocupar', [
            'homecamper' => HomeCamper::findOrFail($id)
        ]);
    }

    //Resultado reserva
    
    public function show($id, $id_res)
    {                      
            return view('resultado', [
                'homecamper' => HomeCamper::findOrFail($id),
                'reserva' => Reservas::findOrFail($id_res)
            ]);  
       
    }

    
}
/*
$user = User::find($res->user_id);
Auth::loginUsingId($user->id);
if (Auth::loginUsingId($user->id)){*/