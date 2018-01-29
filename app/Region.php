<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;

class Region extends Model
{
    protected $table = "tbl_region";
    protected $fillable = ['nombre', 'ISO_3166_2_CL' ];

    public function propiedades()
    {
        return $this->hasMany('App\Region');
    }
}