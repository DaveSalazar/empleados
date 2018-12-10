<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'tbl_zona';

    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
}
