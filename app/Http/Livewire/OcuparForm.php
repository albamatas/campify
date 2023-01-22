<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Lean\ConsoleLog\ConsoleLog;


use Livewire\Component;
use App\Models\User;
use App\Models\HomeCamper;
use App\Models\Reservas;
use App\Models\Ocupacion;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Auth\Events\Registered;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Mail\ReservaConfirmada;
use App\Mail\NuevaReserva;
use Illuminate\Support\Facades\Mail;


class OcuparForm extends Component
{

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    use ConsoleLog;
    public $currentPage = 1;
    public $email = null;
    public $telf = null;
    public $name = null;
    public $password = null;
    public $entrada = null;
    public $salida = null;
    public $dias = null;
    public $matricula = null;
    public $homecamper = null;
    public $show = true;
    public $email2 = null; 
    public $password2 = null; 
    public $nombre_reserva = null;
    public $reserva = null;
    
    public $plazas = 0;
   
    public $d1 = null;
    public $d2 = null;
    public $date1 = null;
    public $date2 = null;
    public $fechaocupada = array();  
    public $credentials = array();    

    protected $listeners = [
        'Refresh' => '$refresh',
   ];

    public $pages = [
        1 => [
            'h2' => 'Selecciona las fechas de la reserva',
            'progres' => '90%',
        ],
        /*2 => [
            'h2' => '¿Ya tenes una cuenta en campify?',
            'progres' => '50%',
        ],
        3 => [
            'h2' => '¿Cómo te pueden contactar des de la zona campify?',
            'progres' => '60%',
        ],
        4 => [
            'h2' => 'Para que cuando llegues sepan que eres tú...',
            'progres' => '80%'           
        ],
        5 => [
            'h2' => 'Crea tu cuenta para gestionar tus reservas',
            'progres' => '90%',
        ]*/
      
       ];
    
    private $validationRules = [
        1 => [
            'entrada' => ['required','date', 'date_format:Y-m-d', 'after:yesterday', 'before:salida' ],
            'salida' => ['required','date', 'date_format:Y-m-d', 'after:entrada' ]
            ],
       /* 3 => [
            'email' => ['required', 'email', 'unique:users,email'],
            'telf' => ['required', 'numeric', 'digits_between:6,9'],
            'name' => ['required', 'min:2'],
        ],
        4 => [
            'matricula' => ['required', 'min:4', 'max:15']
        ],
        5 => [
            'password' => ['required', 'min:8']
        ],*/
       
    ];
    
    public function mount($homecamper_id){
        /*$this->tipos = TiposHomeCamper::all()->sortBy('tipos');
        $this->provincias = Provincias::all()->sortBy('provincias');  */
        $this->homecamper =  HomeCamper::find($homecamper_id);
    }

    public function goToNextPage(){
        $this->validate($this->validationRules[$this->currentPage]);
        
        //Validar disponibilidad cuando informe fechas
          if($this->currentPage == 1){
            $plazas = $this->homecamper->plazas;
            
            $i = 0;
            $fecha_temp1 = $this->entrada;
            $fecha_temp3 = null;
            $this->fechaocupada = array();  
            $ocupaciones = null;
                        
            //Recorres totes les ocupacions per detectar si hi ha places en els dies seleccionats
            while ($i < $this->dias){
                $this->consoleLog("inicio while");
            if($fecha_temp3 != null){
                $fecha_temp1 = $fecha_temp3;
            }else{}
                $this->consoleLog("Consultar fecha");
                $ocupaciones = Ocupacion::where('fecha', $fecha_temp1)->count();
                if ($ocupaciones < $plazas){ 
                    $this->consoleLog("Esta fecha esta libre:" . $fecha_temp1);                
                }
                else{
                    $this->consoleLog("Esta fecha esta OCUPADA:" . $fecha_temp1);
                    $fecha_temp1 = date('d-m-Y', strtotime($fecha_temp1));        
                    array_push($this->fechaocupada, $fecha_temp1);
                               
                }                                 
            $i++;
            $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day'));          
           }
           //endwile

           //Si en la fecha ocupada no hay datos almacenados, quiere decir que todos los días está libres y puede continuar el formulario
            if ($this->fechaocupada == null){
                $this->consoleLog("RESULTADO OK: Todas las fechas estan disponibles");

                //Si el usuario ya está autenticado, finaliza su reserva y navega directamente a confirmar

                //Si el usuario no está autenticado, navega a una pantalla intermedia para elegir si ya tiene cuenta o aún no
 
                //$this->currentPage++;
                //$this->emit('scrollTop');
                $this->store();
            }else{
                $this->consoleLog("KO: Alguna fecha no está disponible");
                return $this->fechaocupada;
                                
            }
        }else{
        //En cas que no estigui a la pagina 1, suma una página
        //$this->currentPage++;
       // $this->emit('scrollTop');
        }
    }  

    //public function sinCuenta(){
    //    $this->currentPage = 3;
   //}   
   
   //La función de AUTENTICATE que lanza el modal de login se gestiona des del modal de livewire anidado

   /* public function goToPreviousPage(){
         $this->currentPage--;
    }   
    */
    
    
    public function updatedentrada(){
        $this->validate(['entrada' => ['required','date', 'date_format:Y-m-d', 'after_or_equal:today', 'before:salida' ]]);

        //Por si la entrada se modifica después de la salida
        if($this->salida != null){
            //Asignar dias         
        $this->date1=new DateTime($this->entrada);
        $this->date2=new DateTime($this->salida);

        $interval = $this->date1->diff($this->date2);
        $this->dias = $interval->format('%a');

        //Asignar precio
        $this->precio = $this->homecamper->precio * $this->dias;
        }
    }

    public function updatedsalida(){
        $this->validate(['salida' => ['required','date', 'date_format:Y-m-d', 'after:entrada' ]]);
       
        //Asignar dias         
        $this->date1=new DateTime($this->entrada);
        $this->date2=new DateTime($this->salida);

        $interval = $this->date1->diff($this->date2);
        $this->dias = $interval->format('%a');

        //Asignar precio
        $this->precio = $this->homecamper->precio * $this->dias;
    }

    /* public function updatedmatricula(){
        $this->validate(['matricula' => ['required', 'min:4', 'max:15']]);
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

    */
    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.ocupar-form');
       

        /* return view('livewire.publicar-homecamper-form',
        [
                'tipos' => TiposHomeCamper::all()->sortBy('tipos')
         ]);*/
    
    }

    public function store(){

        //CREAR USUARIO Y RESERVAR
      /*  $this->validate(['password' => ['required', 'min:8']]);

       $user = User::create([
            'name' => $this->name,
            'telefono' => $this->telf,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'password' => Hash::make($this->password)
        ]);
        */
        

        $reserva = Reservas::create([
            'entrada' => $this->entrada,
            'salida' => $this->salida,
            'dias' => $this->dias,
            'precio' => $this->precio,
            'comision' => 0.00,
            'user_id' => $this->homecamper->user->id,
            'homecamper_id' => $this->homecamper->id
        ]);
        
        $i = 0;
        $fecha_temp1 = $this->entrada;
        $fecha_temp3 = null;
        
        //Crea 1 registro para cada dia de ocupacion
        while ($i < $this->dias){
           if($fecha_temp3 != null){
              $fecha_temp1 = $fecha_temp3;
           }
            
            Ocupacion::create([
                'fecha' => $fecha_temp1,
                'user_id' => $this->homecamper->id,
                'homecamper_id' => $this->homecamper->id,
                'reserva_id' => $reserva->id            
            ]);               
            $i++;
           
            $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day')); 
        
            
        }
      // Enviar email de confirmación de reserva
       //  $correo = New ReservaConfirmada ($reserva, $this->homecamper);
       // Mail::to($this->email)->send($correo);
       $this->emit('Refresh');
       $this->emit('OcuparForm', $this->reserva);
        $notificaHomecamper = New NuevaReserva ($reserva, $this->homecamper);
        Mail::to($this->homecamper->user->email)->send($notificaHomecamper);
       
        $this->nombre_reserva = 'Reserva manual ' . $reserva->id;
        
        $this->reserva = $reserva;

        $this->consoleLog($reserva);
        $this->emit('Refresh');
        $this->emit('OcuparForm', $this->reserva);

        $this->confirmar();
        
      //return redirect()->route('resultado', [ 'id' => $this->homecamper->id, 'id_res' => $reserva->id]);
        
    }
    public function confirmar () {
        $this->dispatchBrowserEvent( 'swal:ocupacionConfirmada', [
            'type' => 'success'
        ]);

    }
}
