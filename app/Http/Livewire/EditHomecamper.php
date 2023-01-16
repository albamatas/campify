<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;


use App\Models\TiposHomeCamper;
use App\Models\Provincias;
use App\Models\Poblaciones;
use App\Models\User;
use App\Models\HomeCamper;
use App\Models\Direcciones;
use App\Models\Servicios;
use App\Models\ServiciosHomeCamper;
use App\Models\Fotos;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use DateTime;

class EditHomecamper extends Component
{
    use WithFileUploads;

    public $user;
    public $descripcion=null;
    public $servicios=null;
    public $staticservicio=null;
    public $checked=false;
    public $imageAll = [];
    public $image;
    public $fotos;
    public $imgtempAll = [];
    public $class;
    public $style;
    public $guardarfecha;

    public $serviciosSelected = [];

    protected $listeners = [
        'Refresh' => '$refresh',
   ];
    public function mount($user, $guardarfecha)
    {
        if($guardarfecha!=null){        
            
        }else{
            $this->hoy = Carbon::now()->format('Y-m-d');
            $guardarfecha = $this->hoy;
        }
        $this->guardarfecha = $guardarfecha;
        
        $this->user = $user;
        $this->servicios = $user->homecamper->servicios;
        $this->fotos = $user->homecamper->fotos;
        $this->staticservicio = Servicios::all();
    }

    public function render()
    {
        $this->servicios = $this->user->homecamper->servicios;
        return view('livewire.edit-homecamper', [ $this->servicios, $this->fotos, $this->user->homecamper->fotos, $this->imageAll ]);
    }

    public function actualizarDescripcion()
    {
        $this->user->homecamper->descripcion =  $this->descripcion;

        $this->user->homecamper->save(); 
       
        $this->emit('EditHomecamper', $this->user->homecamper->descripcion);
    }

    public function actualizarServicios()
    {
        $numcheks = 0;
        //Revisar si ya hay servicios en este establecimiento, en caso que haya se borran todos, luego se crean los marcados
        
       
        if ($this->servicios !== null){
            //borrar registros
            $borrarservicios = ServiciosHomeCamper::where('homecamper_id', $this->user->homecamper->id)->delete();
            
        } //registrar checks marcados
        
       
        //contar cuantos registros tiene el array 
        //recorrer todos los check para ir registrando servicio a servicio
        foreach ($this->serviciosSelected as $servicio){
            
            ServiciosHomeCamper::create([
                'homecamper_id' => $this->user->homecamper->id,
                'servicio_id' => $servicio
            ]);
            }
        
            $this->servicios = ServiciosHomeCamper::where('homecamper_id', $this->user->homecamper->id)->get();
       
        $this->emit('Refresh');
        $this->emit('EditHomecamper', $this->fotos, $this->servicios);      
    }

    public function subirImagen(){
        
        $tmp = null;
        //Es diferente el sitio donde se guarda la imagen y luego donde se accede
        
        $this->imgtempAll = $this->imageAll;
        foreach ($this->imageAll as $this->image){

            $tmp = $this->image->store('public/imagenesHomeCamper');
            //Por este motivo modificamos la url que devuelve la sentencia anterior
            $url = Storage::url($tmp);
            
            Fotos::Create([
                'url' => $url,
                'homecamper_id' => $this->user->homecamper->id
            ]);
        }
        $this->fotos= null;
        $this->fotos = $this->user->homecamper->fotos;
        $this->imageAll = [];
        $this->imagetmpAll = [];
        $this->image = null;
        $this->emit('Refresh');
        $this->emit('EditHomecamper', $this->fotos);      
    }
    
}
