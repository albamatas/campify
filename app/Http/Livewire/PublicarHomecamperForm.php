<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use Livewire\Component;
use App\Models\TiposHomeCamper;
use App\Models\Provincias;
use App\Models\Poblaciones;
use App\Models\User;
use App\Models\HomeCamper;
use App\Models\Direcciones;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


use App\Mail\confirmacionPublicado;
use Illuminate\Support\Facades\Mail;

class PublicarHomecamperForm extends Component
{
    public $currentPage = 1;
    public $nombre = null;
    public $tipos = null;
    public $tipohomecamper = null;
    public $plazas = null;
    public $precio = null;
    public $calle = null;
    public $dir_numero = null;
    public $provincias = null;
    public $provincia = null;
    public $poblaciones = null;
    public $poblacion = null;
    public $email = null;
    public $telf = null;
    public $name = null;
    public $password = null;
    
    

    public $pages = [
        1 => [
            'h2' => '¿Aun no nos conocmos? Empezemos con las presentaciones ',
            'progres' => '40%',
        ],
        2 => [
            'h2' => 'Hablemos de números... ',
            'progres' => '60%',
        ],
        3 => [
            'h2' => '¿Dónde se ubica tu establecimiento?',
            'progres' => '80%'           
        ],
        4 => [
            'h2' => '¿Cómo quieres que te contacten tus clientes?',
            'progres' => '90%',
        ],
        5 => [
            'h2' => 'Por último... tu contreseña de acceso a Campify para que puedas gestionar las reservas',
            'progres' => '98%',
        ],
        ];
    
    private $validationRules = [
        1 => [
            'nombre' => ['required', 'min:5'],
            'tipohomecamper' => ['required']
                    ],
        2 => [
            'plazas' => ['required', 'numeric', 'integer'],
            'precio' => ['required', 'numeric', 'max:25.00']
        ],
        3 => [
            'calle' => ['required', 'min:5'],
            'dir_numero' => ['required'],
            'provincia' => ['required'],
            'poblacion' => ['required']
        ],
        4 => [
            'email' => ['required', 'email', 'unique:users,email'],
            'telf' => ['required', 'numeric', 'digits_between:6,9']
        ],
        5 => [
            'name' => ['required', 'min:2'],
            'password' => ['required', 'min:8']
        ],
    ];
    
    public function mount(){
        $this->tipos = TiposHomeCamper::all()->sortBy('tipos');
        $this->provincias = Provincias::all()->sortBy('provincias');

    }

    public function goToNextPage(){
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
        $this->emit('scrollTop');
    }  

    public function goToPreviousPage(){
         $this->currentPage--;
    }   
    
    
    public function updatednombre(){
        $this->validate(['nombre' => ['required', 'min:5']]);
    }

    public function updatedtipohomecamper(){
        $this->validate(['tipohomecamper' => ['required']]);
    }

    public function updatedplazas(){
        $this->validate(['plazas' => ['required', 'numeric', 'integer']]);
    }

    public function updatedprecio(){
        $this->validate(['precio' => ['required', 'numeric', 'max:25.00']]);
    }
    public function updatedcalle(){
        $this->validate(['calle' => ['required', 'min:5']]);
    }

    public function updateddir_numero(){
        $this->validate(['dir_numero' => ['required']]);
    }

    public function updatedprovincia($provincia){
        $this->validate([ 'provincia' => ['required']]);

        
        $this->poblaciones = Poblaciones::all()->where('id_provincia', $this->provincia)->sortBy('poblacion');
               return $this->poblaciones;   
               
               
    }
    public function updatedpoblacion(){
        $this->validate([ 'poblacion' => ['required']]);
    }

    public function updatedemail(){
        $this->validate(['email' => ['required', 'email', 'unique:users,email']]);
    }
    public function updatedtelf(){
        $this->validate(['telf' => ['required', 'numeric', 'digits_between:6,9']]);
    }
  
    public function updatedname(){
        $this->validate(['name' => ['required', 'min:2']]);
    }

    public function updatedpassword(){
        $this->validate(['password' => ['required', 'min:8']]);
    }

    
    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.publicar-homecamper-form');
       

        /* return view('livewire.publicar-homecamper-form',
        [
                'tipos' => TiposHomeCamper::all()->sortBy('tipos')
         ]);*/
    
    }
    public function store(){
       $user = User::create([
            'name' => $this->name,
            'telefono' => $this->telf,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $camper = HomeCamper::create([
            'nombre' => $this->nombre,
            'slug' => Str::slug($this->nombre, '-'),
            'plazas' => $this->plazas,
            'precio' => $this->precio,
            'user_id' => $user->id,
            'tipo_id' => $this->tipohomecamper
        ]);
        

        Direcciones::create([
            'calle' => $this->calle,
            'numero' => $this->dir_numero,
            'poblacion_id' => $this->poblacion,
            'provincia_id' => $this->provincia,
            'homecamper_id' => $camper->id
        ]);
        
        //event(new Registered($user));

        // Enviar email de confirmación de reserva
        $correo = New ReservaConfirmada ();
        Mail::to($this->email)->send($correo);
       
       return redirect()->route('publicar-resultado');
       
    }
}
