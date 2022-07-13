<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Attribute;
use \Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'telefono',
        'password',
        'matricula',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

       //Relacion uno a muchos inversa//
       public function reservas(){
        return $this->hasMany(Reservas::class, 'user_id');
        }

        //Relacion uno a uno//
       public function homecamper(){
        return $this->hasOne('App\Models\HomeCamper', 'user_id');
        }
        
        //Relacion uno a muchos inversa//
        public function ocupaciones(){
            return $this->hasMany('App\Models\Ocupacion');
        }
        protected function name (): Attribute
    {
        return new Attribute(
            set: fn ($value) => ucwords($value)
        );
    }

    
}

