<?php

namespace App\Http\Livewire;


use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Lean\ConsoleLog\ConsoleLog;


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
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;




class EditHomecamper extends Component
{
    use WithFileUploads;
    use ConsoleLog;

    public $user;
    public $descripcion=null;
    public $nombre;
    public $precio;
    public $tipo;
    public $tipos;
    public $plazas;
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
        'set',
   ];

   protected $rules = [
    'nombre' => 'required|min:3',
    'descripcion' => 'required|min:3',
    'precio' => ['required', 'numeric', 'max:25.00'],
    'plazas' => ['required', 'numeric'],
    'serviciosSelected' => '',
    'tipo' => '',
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

        if($user->homecamper->descripcion == ""){
            $this->descripcion = null;
             }else{
                $this->descripcion = $user->homecamper->descripcion;
             }
        
         if($user->homecamper->nombre == ""){
              $this->nombre = null;
              }else{
               $this->nombre = $user->homecamper->nombre;
              }

              $this->precio = $user->homecamper->precio;
              $this->plazas = $user->homecamper->plazas;
                
              
              $this->tipos = TiposHomeCamper::all()->sortBy('tipos');
              $this->servicios = ServiciosHomeCamper::where('homecamper_id', $this->user->homecamper->id)->get();
              

              if($this->servicios !== null){
                $this->checked=true;
                foreach($this->servicios as $servicio){
                
                array_push($this->serviciosSelected, $servicio->servicio_id);
                }
                
                
              }
              
        
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
        $this->validate(['descripcion' => ['required', 'min:10']]);
        $this->user->homecamper->descripcion =  $this->descripcion;

        $this->user->homecamper->save(); 
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('EditHomecamper', $this->user->homecamper->descripcion);
    }

    
    public function actualizarNombre()
    {
        $this->validate(['nombre' => ['required', 'min:3']]);
        
        $this->user->homecamper->nombre =  $this->nombre;
        $this->user->homecamper->save();    
        $this->emit('EditHomecamper', $this->user->homecamper->nombre);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function actualizarTipo(){
       
        $this->validate(['tipo' => ['required']]);
        $tipo = TiposHomeCamper::where('id', $this->tipo)->get();
        
        $this->user->homecamper->tipo_id = $this->tipo;        
        $this->user->homecamper->save();   
        $this->user->homecamper->refresh();
        
        $this->emit('EditHomecamper', $this->user->homecamper->tipo);
        $this->dispatchBrowserEvent('close-modal');
       
    }


    public function actualizarPrecio()
    {
        $this->validate(['precio' => ['required', 'numeric', 'max:25.00']]);
        $this->user->homecamper->precio =  $this->precio;

        $this->user->homecamper->save(); 
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('EditHomecamper', $this->user->homecamper->precio);
    }

    public function actualizarPlazas()
    {
        $this->validate([ 'plazas' => ['required', 'numeric']]);
        $this->user->homecamper->plazas =  $this->plazas;

        $this->user->homecamper->save(); 
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('EditHomecamper', $this->user->homecamper->plazas);
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

    public function set(){
        $this->consoleLog("setting");
        
        $tmp = null;
        //Es diferente el sitio donde se guarda la imagen y luego donde se accede
        $this->consoleLog($this->imageAll);
        $this->imgtempAll = $this->imageAll;
        foreach ($this->imageAll as $this->image){
            
            $tmpUrl = $this->image->path();
            $fileName = $this->image->getClientOriginalName();
            
            $manager = new ImageManager(['driver' => 'gd']);
            $img = $manager->make($tmpUrl)->encode('jpg')->orientate();
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });         
           
            $resized = $img->save($this->image->temporaryUrl()); 
            
        }
        
    }

    public function subirImagen(){
        
        $tmp = null;
        $this->consoleLog("subir imagen");
        //Es diferente el sitio donde se guarda la imagen y luego donde se accede
        
        $this->imgtempAll = $this->imageAll;
        foreach ($this->imageAll as $this->image){
            

            $tmpUrl = $this->image->path();
            $fileName = $this->image->getClientOriginalName();
            $random = Str::random(3);
            //Els svg donen error això evita que intervention image els tracti 
            if ($this->image->getClientOriginalExtension() != 'svg'){
                $manager = new ImageManager(['driver' => 'gd']);
                $img = $manager->make($tmpUrl)->encode('jpg')->orientate();
                $img->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
           
            $resized = $img->save($tmpUrl); 
            }

           // $resized = $img->scaleDown(width: 700);
           // $img->save('public/imagenesHomeCamper');
             //   dd($tmpUrl);   
            
           // $tmp = $resized->save('public/imagenesHomeCamper/'. $fileName);

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
