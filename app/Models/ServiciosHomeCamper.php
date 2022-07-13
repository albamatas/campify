<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosHomeCamper extends Model
{
    use HasFactory;

    protected $table = 'servicios_homecamper';

    protected $fillable = [
        'id',
        'homecamper_id',
        'servicio_id'
    ];

    //Relación una a muchos//
    public function homeCamper(){
        return $this->hasMany(HomeCamper::class);
    }

    //Relación una a uno//
    public function servicio(){
        return $this->belongsTo(Servicios::class);
        }

       

}
