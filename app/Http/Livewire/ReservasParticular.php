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

class ReservasParticular extends Component
{
    public $hoy = null;
    public $user;
    public $reservas = [];
    public $historico = [];


    public function mount($user)
    {
        $this->user = $user;
            
        $this->hoy = Carbon::now()->format('Y-m-d');

        
        $this->reservas = Reservas::where('user_id', $this->user->id)
                                    ->where('salida', '>=', $this->hoy)
                                    ->get();

        $this->historico = Reservas::where('user_id', $this->user->id)
                                     ->where('salida', '<', $this->hoy)
                                    ->get();
        
       
    }

    public function render()
    {
        return view('livewire.reservas-particular');
    }
}
