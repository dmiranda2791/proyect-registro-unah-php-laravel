<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function seccion() {
        return $this->hasOne('App\Seccion');
    }
}
