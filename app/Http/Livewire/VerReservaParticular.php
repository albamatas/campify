<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\HomeCamper;
use App\Models\Reservas;
use App\Models\Ocupacion;
use Lean\ConsoleLog\ConsoleLog;
use DateTime;
use Illuminate\Support\Str;

class VerReservaParticular extends Component
{
    use ConsoleLog;
    public $reserva;
 
    protected $listeners = [
        'Refresh' => '$refresh',
   ];


    
    public function mount($reserva){
        $this->reserva = $reserva;
    }

    public function render()
    {
        return view('livewire.ver-reserva-particular', [
         'reserva' => $this->reserva]);
            
    }
  
    
}
