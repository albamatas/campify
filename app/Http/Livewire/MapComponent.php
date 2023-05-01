<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MapComponent extends Component
{
    public $latitude;
    public $longitude;
    public $address;
    public $currentLat;
    public $defaultLat = 40.710820;
    public $currentLng;
    public $defaultLng =  -3.592078;
    public $markers;




    public function mount()
    {
        $this->currentLat = $this->defaultLat;
    $this->currentLng = $this->defaultLng;
    $this->markers[] = [
        'lat' => $this->currentLat,
        'lng' => $this->currentLng,
    ];

    $this->dispatchBrowserEvent('initMap', [
        'lat' => $this->currentLat,
        'lng' => $this->currentLng,
    ]);

        return view('livewire.map-component');
    }

    public function addAddress()
    {
        // Guarda la dirección y las coordenadas en la base de datos
        DB::table('direcciones')->insert([
            'latitud' => $this->latitude,
            'longitud' => $this->longitude,
            'direccion' => $this->address,
        ]);

        // Restablece los valores de las propiedades
        $this->latitude = null;
        $this->longitude = null;
        $this->address = null;
    }

    public function render()
    {
        return view('livewire.map-component', [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);
    }
}


