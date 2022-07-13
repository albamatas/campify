<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;

    protected $table = 'provincias';

    public function poblaciones(){
    return $this->hasMany(Poblaciones::class, 'id_provincia');
    }

    public function direcciones(){
        return $this->hasMany(Direcciones::class, 'provincia_id');
        }
}
