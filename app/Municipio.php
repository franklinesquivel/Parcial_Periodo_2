<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'nombre', 'departamento_id'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }
}
