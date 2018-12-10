<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{

    protected $table = 'tbl_sector';

    public function zonas()
    {
        return $this->hasMany('App\Zona');
    }

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
}
