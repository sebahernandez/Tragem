<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Region;
use App\Provincia;
use App\Comuna;

class Propiedad extends Model
{
	use SoftDeletes;

	 protected $dates = ['deleted_at'];
    protected $table = "propiedades";
    protected $fillable = ['nombre', 
                           'descripcion', 
                           'lat', 
                           'lon',
                           'direccion',
                           'tbl_comuna_id',
                           'tbl_provincia_id',
                       	   'tbl_region_id',
                       	   'habitaciones',
                       	   'banios',
                       	   'garages',
                       	   'superficie',
                       	   'precio',
                       	   'features',
                           'img_destacada',
                           'clase'
                          ];

    public function region()
    {
        return $this->belongsTo('App\Region','tbl_region_id');
    }

    public function provincia()
    {
        return $this->belongsTo('App\Provincia','tbl_provincia_id');
    }

    public function comuna()
    {
        return $this->belongsTo('App\Comuna','tbl_comuna_id');
    }

    public function agente()
    {
      return $this->belongsTo('App\User');
    }
}
