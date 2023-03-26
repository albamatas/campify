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
use Illuminate\Database\Eloquent\Builder;

class ReservasGestion extends Component
{
    public $buscar = null;
    public $reservasNombre = null;
    public $user;
    public $terminoBusqueda = null;
    public $guardarfecha = null;
    public $nombre_generico = 'Reserva manual';
    public $resultados = [];
    public $entrada;
    public $salida;
    public $numeroBusqueda = null;


    public function mount($user)
    {
        $this->user = $user;
        

    }
    public function render()
    {
        
        return view('livewire.reservas-gestion');
    }
    public function buscar()
    {
        //$buscar = $this->buscar;
        //$reservas = Reservas::where('homecamper_id', $this->user->homecamper->id)->get();
        //dd($reservas->homecamper);
        //$this->reservasNombre = $reservas->user::where('name', $buscar);
         
    }

    public function search()
{
     
    $usuariosCoincidentes = User::where('id', 'not like', $this->user->id) 
            ->where(function($query) {
                
                $sinespacios = trim($this->terminoBusqueda);
                $terminoBusqueda = '%'. $sinespacios .'%';
                $query->where('name', 'like', $terminoBusqueda)
                      ->orWhere('matricula', 'like', $terminoBusqueda)
                      ->orWhere('email', 'like', $terminoBusqueda)
                      ->orWhere('telefono', 'like', $terminoBusqueda); 
            })
            ->whereHas('reservas', function (Builder $query){
        $query->where('homecamper_id', $this->user->homecamper->id)
        ->where('user_id', 'not like', $this->user->id) ;   
    })
    ->get()->load('reservas');

    $reservas = collect();
  foreach ($usuariosCoincidentes as $usuario) {
    $reservas = $reservas->merge($usuario->reservas);
}

$this->resultados = $reservas;    
    
    
}
public function buscarNumero(){
    $sinespacios = trim($this->numeroBusqueda);
    $numeroBusqueda = '%'. $sinespacios .'%';
    $this->resultados = Reservas::where('id', 'like', $numeroBusqueda)
        ->where('homecamper_id', $this->user->homecamper->id)
        ->where('user_id', 'not like', $this->user->id)    
        ->get();

   return $this->resultados;
    }

    public function buscarEntrada(){
    
        $this->resultados = Reservas::where('entrada', $this->entrada)->where('homecamper_id', $this->user->homecamper->id)->get();
    
       return $this->resultados;
    
    }

    public function buscarSalida(){
    
        $this->resultados = Reservas::where('salida', $this->salida)->where('homecamper_id', $this->user->homecamper->id)->get();
    
       return $this->resultados;
    
    
    }
}







