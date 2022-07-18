<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservas;
use App\Models\Ocupacion;
use App\Models\HomeCamper;
use DateTime;
use Illuminate\Support\Str;

class ResumenActividad extends Component
{
    public $hoy = null;
    public $diaconsulta = null;
    public $reservas = [];
    public $entradas = [];
    public $salidas = [];
    public $noches = [];
    public $guardarfecha = null;

    protected $listeners = [
        'Refresh' => '$refresh',
   ];

    public function mount($user, $guardarfecha)
    {
        $this->user = $user;
        if($guardarfecha == null){
            
        $this->hoy = Carbon::now()->format('Y-m-d');
        $guardarfecha = $this->hoy;
        $this->guardarfecha = $guardarfecha;
        $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->hoy)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->hoy)->where('homecamper_id', $this->user->homecamper->id)->get();
       

        $this->noches = Ocupacion::where('fecha', $this->hoy)->where('homecamper_id', $this->user->homecamper->id)->get();

        }else{
            $this->hoy = Carbon::now()->format('Y-m-d');
            $this->diaconsulta = $guardarfecha;
            $this->guardarfecha = $this->diaconsulta;
            $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
       

        $this->noches = Ocupacion::where('fecha', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
        }
       
    }

    public function render()
    {
        return view('livewire.resumen-actividad', [$this->hoy, $this->diaconsulta, $this->entradas, $this->salidas, $this->noches]);
    }
   
    public function diaAnterior(){
       
        if($this->diaconsulta == null){
        //sumar 1 día al día actual
        $fecha_temp = Carbon::parse($this->hoy)->subDay(); 
        $this->diaconsulta = $fecha_temp;

        //Modificamos arrays dinamicos
        $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();

        $this->noches = Ocupacion::where('fecha', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
        }else{
            //sumar 1 día al día actual
            $fecha_temp = Carbon::parse($this->diaconsulta)->subDay(); 
            $this->diaconsulta = $fecha_temp;

        //Modificamos arrays dinamicos
        $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();

        $this->noches = Ocupacion::where('fecha', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
        }
        $this->emit('ResumenActividad', [$this->hoy, $this->diaconsulta, $this->entradas, $this->salidas, $this->noches]);
        $this->guardarfecha = $this->diaconsulta;
    } 

    public function diaSiguiente(){
       
        if($this->diaconsulta == null){
        //sumar 1 día al día actual
        $fecha_temp = Carbon::parse($this->hoy)->addDay(); 
        $this->diaconsulta = $fecha_temp;

        //Modificamos arrays dinamicos
        $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();

        $this->noches = Ocupacion::where('fecha', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
        }else{
            //sumar 1 día al día actual
            $fecha_temp = Carbon::parse($this->diaconsulta)->addDay(); 
            $this->diaconsulta = $fecha_temp;

        //Modificamos arrays dinamicos
        $this->reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        
        $this->entradas = Reservas::where('entrada', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
      
        $this->salidas = Reservas::where('salida', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();

        $this->noches = Ocupacion::where('fecha', $this->diaconsulta)->where('homecamper_id', $this->user->homecamper->id)->get();
        }
        $this->guardarfecha = $this->diaconsulta;
    } 

   
}
