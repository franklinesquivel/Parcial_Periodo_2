<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dui', 'nombre', 'apellido', 'email', 'fechaNac', 'direccion', 'telefono', 'municipio_id', 'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }

    public function isAdmin()
    {
        return $this->userType->id == 'ADM';
    }

    public function isClient()
    {
        return $this->userType->id == 'CLE';
    }

    public function cuentas()
    {
        return $this->isClient() ? $this->hasMany('App\Cuenta') : null;
    }

    public function municipio()
    {
        return $this->belongsTo('App\'Municipio');
    }
}
