<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provincias;
use App\Models\Poblaciones;


class SelectorMunicipioProvincia extends Component
{
     
    public $provincia_id_get = null;
    public $temp_id = null;
    public $poblacionSelected = null;
    public $temp_selected;
    public $iteration = 0;
    public $poblacionSelected1 = null;
   
  


    

    public function render()
    {
        return view('livewire.selector-municipio-provincia', 
            [ 
               'provincias' => Provincias::all()->sortBy('provincias')
            ]);
    }


    public function updated($provincia_id_get){
        
        
        $this->poblacionSelected = Poblaciones::all()->where('id_provincia', $this->provincia_id_get)->sortBy('poblacion');
               return $this->poblacionSelected;     
       
    }
    
    
}
