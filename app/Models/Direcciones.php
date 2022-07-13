<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'calle',
        'numero',
        'provincia_id',
        'poblacion_id',
        'altitud',
        'longitud',
        'homecamper_id'
    ];
    
    public function homecamper(){
        return $this->belongsTo(HomeCamper::class, 'homecamper_id');
    }

    public function provincia(){
        return $this->belongsTo('App\Models\Provincias', 'provincia_id');
    }

    public function poblacion(){
        return $this->belongsTo('App\Models\Poblaciones', 'poblacion_id');
    }

    protected function calle (): Attribute
    {
        return new Attribute(
            set: fn ($value) => ucfirst($value)
        );
    }

}
