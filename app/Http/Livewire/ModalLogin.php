<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\HomeCamper;
use App\Models\Reservas;
use App\Models\Ocupacion;

use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Auth\Events\Registered;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\ReservaConfirmada;
use App\Mail\NuevaReserva;
use Illuminate\Support\Facades\Mail;

use Livewire\Component;
use Lean\ConsoleLog\ConsoleLog;

class ModalLogin extends Component
{

    public $entrada = null;
    public $salida = null;
    public $dias = null;
    public $matricula = null;
    public $homecamper = null;
    public $show = true;
    
    public $plazas = 0;
   
    public $d1 = null;
    public $d2 = null;
    public $date1 = null;
    public $date2 = null;
    public $precio = null;
    public $fechaocupada = array();  
    public $credentials = array();    
    public $email2 = null; 
    public $password2 = null; 
    public $acceso = null;
    public $email = null;

    use ConsoleLog;

    protected $listeners = [
        'Acceder'
   ];

    public function mount($acceso, $homecamper, $entrada, $salida, $dias, $precio)
    {
        $this->consoleLog("mounting");
        $this->consoleLog($acceso);
       $this->acceso = $acceso;
       if($acceso == 'reservar'){
        $this->homecamper =  $homecamper;
        $this->entrada =  $entrada;
        $this->salida = $salida;
        $this->dias = $dias;
        $this->precio = $precio;
       }
    }
    public function render()
    {
        return view('livewire.modal-login');
    }

    
   public function authenticate()
   {
    

    $this->consoleLog("Entra en la funcion autenticate");
   

    $this->validate([ 
        'email2' => ['required', 'email'],
        'password2' => ['required']
    ]);
       
       
       if (Auth::attempt(['email' => $this->email2, 'password' => $this->password2])) {
        // Authentication was successful...
            

         $this->consoleLog("usuario autenticado");
          
           $user = User::where('email', $this->email2)->first();
          
           

           //Si el usuario accede desde el formulario de reservas
           if($this->acceso == 'reservar'){
                //Guarda reserva
                $this->consoleLog($user);

                //Chequear que no haya reservado ya para esas mismas fechas

                $i = 0;
                $fecha_temp1 = $this->entrada;
                $fecha_temp3 = null;
                $this->fechaocupada = array();  
                $ocupaciones = null;
                            
                //Recorres totes las ocupacions para detectar si ya hay reservas de este homecamper en estas fechas
                              
               
               while ($i < $this->dias){
                    $this->consoleLog("inicio while MISMAS FECHAS");
                if($fecha_temp3 != null){
                    $fecha_temp1 = $fecha_temp3;
                }else{}
                    $this->consoleLog("Consultar fecha");
                    $ocupaciones = Ocupacion::where('fecha', $fecha_temp1)->where('user_id', $user->id)->count();
                   
                    if ($ocupaciones == 0){ 
                        $this->consoleLog("No ha reservado en esta fecha:" . $fecha_temp1);                
                    }
                    else{
                        $this->consoleLog("Ya ha reservado en esa fecha:" . $fecha_temp1);
                        $fecha_temp1 = date('d-m-Y', strtotime($fecha_temp1));        
                        array_push($this->fechaocupada, $fecha_temp1);             
                    }                                 
                $i++;
                $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day'));          
               }
               if(blank($this->fechaocupada)){
                    //Si no hay ninguna fecha en la que ya se ha reservado se inicia la reserva, en caso contrario se devuelve un error conforme ya ha reservado para esas fechas indicando las fechas
                

                    $reserva = Reservas::create([
                        'entrada' => $this->entrada,
                        'salida' => $this->salida,
                        'dias' => $this->dias,
                        'precio' => $this->precio,
                        'comision' => 0.00,
                        'user_id' => $user->id,
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
                             $this->consoleLog('Guardando ocupación');
                            Ocupacion::create([
                                'fecha' => $fecha_temp1,
                                'user_id' => $user->id,
                                'homecamper_id' => $this->homecamper->id,
                                'reserva_id' => $reserva->id            
                            ]);               
                            $i++;
                        
                            $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day')); 
                        
                    }
                    // Enviar email de confirmación de reserva
                    $correo = New ReservaConfirmada ($reserva, $this->homecamper);
                    Mail::to($this->email2)->send($correo);

                    $notificaHomecamper = New NuevaReserva ($reserva, $this->homecamper);
                    Mail::to($this->homecamper->user->email)->send($notificaHomecamper);
                   
      
                     // Nageva al resultado de reserva
                    return redirect()->route('resultado', [ 'id' => $this->homecamper->id, 'id_res' => $reserva->id]);       
                        


               }else{
                  // dd($this->fechaocupada);
                  $this->dispatchBrowserEvent( 'swal:fechaReservada');
                  }
          

              
             }
                //Si viene de login
             if($this->acceso == 'login'){
     
                Auth::login($user);

       
                // LOG -- $this->consoleLog("DETECTA QUE VIENE DE LOGIN");
                //Si tiene un homcamper le mandamos a su dashboard
                if($user->homecamper !== null){

                  // LOG --  $this->consoleLog("ES UN HOMECAMPER");
                                    
                    return redirect()->route('dashboard-homecamper');  
                }else{
                    //Al no tener un homecamper es un usuario particular
                    //pendiente mandarlo a su homecamper
                    return redirect()->route('dashboard-homecamper');
                }
             }
       
     }
       return back()->withErrors([
           'email' => 'Este email no tiene una cuenta en campify.',
       ])->onlyInput('email2');


    }

    public function Acceder(){
        //Esta función se usa en caso que el usuario intente hecer una reserva que ya está ocupada (después de identificarse) y se le dirige a su cuenta para que acceda a sus reservas
        $user = User::where('email', $this->email2)->first();
        
        Auth::login($user);

        return redirect()->route('dashboard-homecamper');
    }
}



