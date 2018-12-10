<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'tbl_persona';

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function zona()
    {
        return $this->belongsTo('App\Zona');
    }
}
