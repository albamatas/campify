<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblaciones extends Model
{
    protected $table = 'poblaciones';

    use HasFactory;

    public function direcciones(){
        return $this->hasMany(Direcciones::class, 'poblacion_id');
        }
    
    public function provincia(){
        return $this->belongsTo('App\Models\Provincias', 'id_provincia');
        }

}
