<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Propiedad;

class Comuna extends Model
{
    protected $table = "tbl_comuna";
    protected $fillable = ['nombre', 'idProvincia' ];

    public function propiedades()
    {
        return $this->hasMany('App\Propiedad');
    }
}