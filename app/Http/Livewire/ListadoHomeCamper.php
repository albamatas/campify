<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeCamper;
use Illuminate\Support\Facades\Cache;

class ListadoHomeCamper extends Component
{
    public $homecamper = [];
    public $i;
    public $j;
    public $scroll = null;

    public function mount(){

        //guardar en cache: listado homecampers, scroll y, valor j;

       /* if (Cache::has('homecamper')) {
            $this->homecamper = Cache::get('homecamper');
        } else {
            $this->homecamper = HomeCamper::get()->all();
            Cache::put('homecamper', $this->homecamper, 1000);
        }
   
        if(Cache::has('j')){
            $this->j = Cache::get('j');
        }else{
            $this->j = 9;
        }*/

        $this->j = 9;

        $this->i = 0;
   
    return view('livewire.listado-home-camper');

    }

    public function render()
    {
        return view('livewire.listado-home-camper', ['homecamper' => $this->homecamper, 'i' => $this->i, 'j' => $this->j]);
    }

    public function mostrarMas(){
        $this->j = $this->j + 10;
        Cache::put('j', $this->j, 1000);
        $this->homecamper = HomeCamper::get()->all();

    }
}
