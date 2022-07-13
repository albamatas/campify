<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    use HasFactory;

    protected $table = 'ocupacion';

    protected $fillable = [
        'fecha',
        'user_id',
        'homecamper_id',
        'reserva_id',
    ];


      //Relación una a muchos//
      public function homeCampers(){
        return $this->belongsToMany(HomeCamper::class, 'homecamper_id');
    }

    public function reservas(){
        return $this->belongsToMany('App\Models\Reservas', 'reserva_id');
    }


    //Relación una a muchos//
    public function user(){
        return $this->belongsTo(User::class);
    }

}
