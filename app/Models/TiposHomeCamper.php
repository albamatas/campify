<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposHomeCamper extends Model
{
    use HasFactory;

    protected $table = 'tipos_home_campers';

    public function homecampers(){
        return $this->hasMany(HomeCampers::class, 'tipo_id');
    }
}
