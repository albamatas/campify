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
    public $sinResultados = null;
    public $buscado = false;
    public $entrada;
    public $salida;
    public $numeroBusqueda = null;

    protected $rules = [
        'numeroBusqueda' => ['numeric'],
    ];
    
    protected $messages = [
        'numeroBusqueda.numeric' => 'El campo número solo puede contener números.',
    ];

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

    public function search(){
    //Si la cerca no conté cap valor es fa un resset
    if($this->terminoBusqueda == '' || $this->terminoBusqueda == ''){
        $this->resultados = [];

    }else{
     //Sinó es fa una cerca
    $usuariosCoincidentes = User::where('id', 'not like', $this->user->id) 
            ->where(function($query) {
                
                $sinespacios = trim($this->terminoBusqueda);
                $terminoBusqueda = '%'. $sinespacios .'%';
                $query->where('name', 'like', $terminoBusqueda)
                    ->where('id', 'not like', $this->user->id)
                      ->orWhere('matricula', 'like', $terminoBusqueda)
                      ->orWhere('email', 'like', $terminoBusqueda)
                      ->orWhere('telefono', 'like', $terminoBusqueda); 
            })
            ->whereHas('reservas', function (Builder $query){
        $query->where('homecamper_id', $this->user->homecamper->id)
        ->where('user_id', '!=', $this->user->id);   
    })
    ->get()->load('reservas');

    $reservas = collect();
    
            foreach ($usuariosCoincidentes as $usuario) {
                $usr_reservas = $usuario->reservas->where('homecamper_id', $this->user->homecamper->id);
                        $reservas = $reservas->merge($usr_reservas);
                       
                    }
               
                //Voler a verificar que únicamente ve los usuarios que reservaron en este homecamper
               // if( $this->user->homecamper->id == $usuario->reservas->homecamper_id){
                    
               // }else{
                   
               // }
                
            
        
        $this->resultados = $reservas; 
        
        foreach ($this->resultados as $reserva){
           
        }

    }

    if($this->resultados == []){
        $this->sinResultados = 0;
        //dd("0");
    }else{
        if($this->resultados->isEmpty()){
        
            //dd("0");
            $this->sinResultados = 0;
        }else{
            
            $this->sinResultados = 1;  
            //dd("1");
        }
    }
    $this->buscado = true;
    return $this->buscado;
    return $this->resultados;
    return $this->sinResultados;
   
    }
public function emitErrorMessage($message)
{
    $this->addError('error', $message);
}
public function buscarNumero(){
    
    if ($this->numeroBusqueda == null) {
        $this->emitErrorMessage('El número de reserva únicamente contiene números.');
        return;
    }else{
      
    $sinespacios = trim($this->numeroBusqueda);
    $numeroBusqueda = '%'. $sinespacios .'%';
    $this->resultados = Reservas::where('id', 'like', $numeroBusqueda)
        ->where('homecamper_id', $this->user->homecamper->id)  
        ->get();

   return $this->resultados;
    }
    }

    public function buscarEntrada(){
    
        $this->resultados = Reservas::where('entrada', $this->entrada)->where('homecamper_id', $this->user->homecamper->id)->get();
    
       return $this->resultados;
    
    }

    public function buscarSalida(){
    
        $this->resultados = Reservas::where('salida', $this->salida)->where('homecamper_id', $this->user->homecamper->id)->get();
    
       return $this->resultados;    
    }
    public function resetResultados(){
        $this->resultados = [];
        $this->buscado = false;
        $this->terminoBusqueda = null;
        $this->numeroBusqueda = null;

        return $this->resultados = [];
        $this->buscado = false;
        $this->terminoBusqueda = null;
        $this->numeroBusqueda = null;
    }
}







