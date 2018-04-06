<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    protected $table = 'users_types';
    protected $fillable = ['nombre', 'descripcion'];
    public function users()
    {
        $this->hasMany('App\User');
    }
}
