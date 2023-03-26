<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'id',
        'entrada',
        'salida',
        'dias',
        'precio',
        'comision',
        'user_id',
        'homecamper_id',
    ];

    //Relación una a muchos//
    public function homecamper(){
        return $this->belongsTo('App\Models\HomeCamper', 'homecamper_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relación una a muchos//
   // public function user(){
    //   return $this->belongsTo(User::class);
    //}

    //Relación una a muchos//
    public function ocupaciones(){
        return $this->hasMany('App\Models\Ocupacion', 'reserva_id');
    }
}
