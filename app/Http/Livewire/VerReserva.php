<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\HomeCamper;
use App\Models\Reservas;
use App\Models\Ocupacion;
use Lean\ConsoleLog\ConsoleLog;
use DateTime;
use Illuminate\Support\Str;

class VerReserva extends Component
{
    use ConsoleLog;
    public $reserva;
    public $entrada = null;
    public $salida = null;
    public $dias = null;
    public $precio;
    public $d1 = null;
    public $d2 = null;
    public $date1 = null;
    public $date2 = null;
    public $fechaocupada = array();  
    public $credentials = array(); 
    public $actualizado = 0;  
    public $guardarfecha = null;
    public $tipo_modificacion = null;
    
    protected $listeners = [
        'Refresh' => '$refresh',
        'borrarReserva'
   ];

    public function updatedentrada(){

        if($this->salida == null){
            
        $this->validate(['entrada' => ['required','date','date_format:Y-m-d', 'before:reserva.salida' ]]);
        }else{
           
            $this->validate(['entrada' => ['required','date', 'date_format:Y-m-d', 'before:salida']]);
        }
    } 

  public function updatedsalida(){
    if($this->entrada == null){
        $this->validate(['salida' => ['required','date', 'date_format:Y-m-d', 'after:reserva.entrada' ]]);
    }else{
        $this->validate(['salida' => ['required','date', 'date_format:Y-m-d', 'after:entrada' ]]);
    }

   
  }


    
    public function mount($reserva, $guardarfecha){
        $this->reserva = $reserva;
               
        $this->guardarfecha = $guardarfecha;
    }

    public function render()
    {
        
        return view('livewire.ver-reserva', [
         'reserva' => $this->reserva, $this->actualizado]);
        
         
    }
public function setActualizado(){
    $this->actualizado = 0;
    $this->emit('VerReserva', [$this-> actualizado ]);

}
public function borrarConfirmar(){
    $this->dispatchBrowserEvent( 'swal:confirm', [
        'type' => 'warning',
        'title' => '¿Seguro que quieres eliminar esta reserva?',
    ]);
}

public function borrarReserva(){

    $eliminarOcupacion = Ocupacion::where('reserva_id', $this->reserva->id);
    $eliminarReserva = Reservas::find($this->reserva->id);
 
    $eliminarOcupacion->delete();
    $eliminarReserva->delete();

    $this->dispatchBrowserEvent( 'swal:reservaBorrada', [
        'type' => 'success'
    ]);

}

public function tipoModificacion ($tipo_modificacion) {
    $this->tipo_modificacion = $tipo_modificacion;
}

    public function actualizarFechas(){
        //Se modifica ambas fechas y no se informa ningún dato antes de clicar botón continuar
        if ($this->tipo_modificacion == 3) {

            if ($this->entrada == null){
                $this->validate(['entrada' => ['required']]);
            }
            if ($this->salida == null){
                $this->validate(['salida' => ['required']]);
            }  
            if ($this->entrada != null){
                  
                $this->validate(['entrada' => ['required','date', 'date_format:Y-m-d', 'before:salida']]);
            }
            if ($this->salida != null){
            $this->validate(['salida' => ['required','date', 'date_format:Y-m-d', 'after:entrada' ]]);
            }
        }

        
        if ($this->tipo_modificacion == 2) {
            $this->validate(['salida' => ['required','date', 'date_format:Y-m-d', 'after:reserva.entrada' ]]);
        }
             
        if ($this->tipo_modificacion == 1) {
               
            $this->validate(['entrada' => ['required','date', 'date_format:Y-m-d', 'before:reserva.salida' ]]);
        }
     
        
        

       // $this->consoleLog("actualizdo :" . $this->actualizado);

        if($this->entrada == null){
            $this->entrada = $this->reserva->entrada;
        }
        if($this->salida == null){
            $this->salida = $this->reserva->salida;
        }
        
            $plazas = $this->reserva->homecamper->plazas;
            
            $i = 0;
            $fecha_temp1 = $this->entrada;
            $fecha_temp3 = null;
            $this->fechaocupada = array();  
            $ocupaciones = null;
            
            //Asignar dias
            $this->date1=new DateTime($this->entrada);
            $this->date2=new DateTime($this->salida);
            $interval = $this->date1->diff($this->date2);
            $this->dias = $interval->format('%a');
            
            //Asignar precio
            $this->precio = $this->reserva->homecamper->precio * $this->dias;          

            //Recorres totes les ocupacions per detectar si hi ha places en els dies seleccionats
            while ($i < $this->dias){
                
                if($fecha_temp3 != null){
                    $fecha_temp1 = $fecha_temp3;
                }else{}
                   // $this->consoleLog("Consultar fecha");
                    
                    //Se consulta su para esa fecha quedan plazas disponibles
                    $ocupaciones = Ocupacion::where('fecha', $fecha_temp1)->count();
                    if ($ocupaciones < $plazas){ 
                       // $this->consoleLog("Esta fecha esta libre:" . $fecha_temp1);                
                    }
                    else{

                        //Si no hay plazas disponibles primero se verifica que esa plaza no la esté usando la misma reserva
                        $f_incremental = date('d-m-Y', strtotime($fecha_temp1));
                        $f_entrada = date('d-m-Y', strtotime($this->reserva->entrada));
                        $f_salida = date('d-m-Y', strtotime($this->reserva->salida));
                      
                           if($f_incremental <= $f_salida && $f_incremental >= $f_entrada){
                           // $this->consoleLog("Esta fecha esta libre y coincide con una de la reserva");  

                           } else{
                           // $this->consoleLog("Esta fecha esta OCUPADA:" . $fecha_temp1);
                            $fecha_temp1 = date('d-m-Y', strtotime($fecha_temp1));        
                            array_push($this->fechaocupada, $fecha_temp1);

                           }
                                    
                    }                                 
                $i++;
                $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day'));          
           }
           //endwile

           //Si en la fecha ocupada no hay datos almacenados, quiere decir que se puede guardar la reserva
            if ($this->fechaocupada == null){
               // $this->consoleLog("RESULTADO OK: Todas las fechas estan disponibles");

                //actualizamos fecha de entrada y de salida de la reserva
                Reservas::where('id', $this->reserva->id)->update([
                    'entrada' => $this->entrada,
                    'salida' => $this->salida,
                    'dias' => $this->dias,
                    'precio' => $this->precio,
                ]);
                $this->consoleLog("Reserva actualizada");
                //borramos los registros en ocupación para luego volver a grabarlos
                
                    $borrarocupacion = Ocupacion::where('reserva_id', $this->reserva->id)->delete();
                    
                  //  $this->consoleLog($borrarocupacion . "Ocupacion borrada");
                
                    $i = 0;
                    $fecha_temp1 = $this->entrada;
                    $fecha_temp3 = null;
        
                    //Crea 1 registro para cada dia de ocupacion
                    while ($i < $this->dias){
                      //  $this->consoleLog("IF");
                    if($fecha_temp3 != null){
                        $fecha_temp1 = $fecha_temp3;
                    }
                        
                    $this->consoleLog("Creando nueva ocupación");
                        Ocupacion::create([
                            'fecha' => $fecha_temp1,
                            'user_id' => $this->reserva->user->id,
                            'homecamper_id' => $this->reserva->homecamper->id,
                            'reserva_id' => $this->reserva->id            
                        ]);               
                        $i++;
                    
                        $fecha_temp3 = date('Y-m-d', strtotime($fecha_temp1.' +1 day')); 
                    
                        
                    }

                    $this->emit('Refresh');
                    $this->dispatchBrowserEvent('hide-form');
                    $this->dispatchBrowserEvent( 'swal:reservaModificada', [
                        'type' => 'success'
                    ]);

            $this->actualizado = 1;
            //$this->consoleLog("actualizdo :" . $this->actualizado);
            $this->emit('VerReserva', [$this->reserva, $this->reserva->entrada, $this->reserva->salida, $this->reserva->dias, $this->reserva->precio, $this->actualizado ]);
            
                            

                
            }else{
                $this->dispatchBrowserEvent( 'swal:reservaNoModificada', [
                   
                ]);
                //$this->consoleLog("KO: Alguna fecha no está disponible");
                $this->entrada = null;
               $this->salida = null;
                $this->emit('VerReserva', $this->fechaocupada);
                $this->dispatchBrowserEvent('hide-form');
               
                //Reset fecha ocupada
                              
            }

           // $this->consoleLog("Fin");
            
    }
}
