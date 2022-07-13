<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    
         //Relacion uno a muchos inversa//
                     
            public function servicio(){
                return $this->hasMany(ServiciosHomecamper::class, 'servicios_id');
            }
       

    
    
}
