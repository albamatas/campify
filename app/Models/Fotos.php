<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;

    protected $table = 'fotos';

    protected $fillable = [
        'id',
        'url',
        'homecamper_id'
    ];

    //Relación una a muchos//
    public function homeCampers(){
        return $this->belongsTo('App\Models\HomeCamper', 'homecamper_id');
    }
}
