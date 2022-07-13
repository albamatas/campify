<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class HomeCamper extends Model
{
    use HasFactory;

    protected $table = 'home_campers';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio',
        'plazas',
        'slug',
        'status',
        'user_id',
        'tipo_id',
    ];

    //Relacion uno a muchos inversa//
    public function reservas(){
        return $this->hasMany(Reservas::class, 'homecamper_id');
        }

    //Relacion uno a muchos inversa//
    public function fotos(){
        return $this->hasMany(Fotos::class, 'homecamper_id');
        }

         //Relacion uno a muchos inversa//
    public function servicios(){
        return $this->hasMany(ServiciosHomeCamper::class, 'homecamper_id');
        }
    

        public function ocupaciones(){
            return $this->hasManyThrough('App\Models\Ocupacion', 'App\Models\Reservas', 'homecamper_id', 'reserva_id');
        }

    public function direccion(){
            return $this->hasOne(Direcciones::class, 'homecamper_id');
        }
    
        public function user(){
            return $this->belongsTo('App\Models\User', 'user_id');
        }
    
    public function tipo(){
        return $this->belongsTo(TiposHomeCamper::class, 'tipo_id');
    }
    //Mutador o modificador
    protected function nombre (): Attribute
    {
        return new Attribute(
            set: fn ($value) => ucfirst($value)
        );
    }
    
    protected function descripcion (): Attribute
    {
        return new Attribute(
            set: fn ($value) => ucfirst($value)
        );
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}

