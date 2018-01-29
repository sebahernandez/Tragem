<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provincia;

class Provincia extends Model
{
    protected $table = "tbl_provincia";
    protected $fillable = ['nombre', 'idRegion' ];

    public function propiedades()
    {
        return $this->hasMany('App\Provincia');
    }
}
