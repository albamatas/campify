<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Lean\ConsoleLog\ConsoleLog;


use Illuminate\Support\Facades\Auth;
use App\Models\HomeCamper;
use App\Models\User;
use App\Models\Reservas;

class DashboardController extends Controller
{
    //
    
    use ConsoleLog;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($guardarfecha = null){
       // $user = HomeCamper::findOrFail($id),

       
       $user = auth()->user();
         //$user = User::where('id', '44')->first();


         //Si el usuario no tiene un homecamper asociado va fuera
         if ($user->homecamper== null){
            
        //posibilidad de devolver una pantalla de error + mensaje
        return view('dashboard_particular', [
          'user' => $user
        ]);  

         }else{
         
           //if($guardarfecha){
             
            return view('dashboard_homecamper', [
              'user' => $user,
              'guardarfecha' => $guardarfecha
            ]);  
           //}else{
           // return view('dashboard_homecamper', [
            //  'user' => $user,
            //  'guardarfecha' =>''
          //  ]);  
          // }
        
        }
    }

    public function edit($guardarfecha = null){
        // $user = HomeCamper::findOrFail($id),
        
        $user = auth()->user();
          //$user = User::where('id', '44')->first();
 
 
          //Si el usuario no tiene un homecamper asociado va fuera
          if ($user->homecamper== null){
             
         //posibilidad de devolver una pantalla de error + mensaje
         // return view ('error', [
         // 'titulo' => 'Es espacio para gestionar tus reservas estará disponible en breve',
         // 'detalle' => 'Puedes consultar las reserva que te enviamos en tu email: $user->email '])
          }else{

            //revisamos qué datos faltan por completar para mandar la info a la vista
            
            
              return view('editar_homecamper', [
              'user' => $user,
              'guardarfecha' => $guardarfecha
            ]);  
          
         }
     }
    public function show($id, $guardarfecha){

       $user = auth()->user();
          //$user = User::where('id', '44')->first();
 
 
          //Si el usuario no tiene un homecamper asociado va fuera
          if ($user->homecamper== null){
            return view('ver_reserva_particular', [
              'reserva' => Reservas::findOrFail($id)
          ]);
          }
        return view('ver_reserva', [
            'reserva' => Reservas::findOrFail($id),
            'guardarfecha' => $guardarfecha
        ]);

    }


}
