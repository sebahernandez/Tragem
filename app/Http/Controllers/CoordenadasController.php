<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\JsonResponse;

class CoordenadasController extends Controller
{
	public function obtener_coordenadas(Request $request)
	{
		if ($request->ajax()) {

            $data = $request->all();
            $datos_mapa = $this->geolocalizar($data['direccion']);

            if($datos_mapa){

            	return new JsonResponse([
            			"latitud" => $datos_mapa[0],
            			"longitud" => $datos_mapa[1], 
            			"localizacion" => $datos_mapa[2], 
            			"error" => 0 
                    ]);
            }else{
            	return new JsonResponse([
            			"error" => 1  
                    ]);
            }
		}
	}

	private function geolocalizar($direccion){
 
        $direccion = urlencode($direccion);
   
        $url = "http://maps.google.com/maps/api/geocode/json?address={$direccion}";
 
        $datosjson = file_get_contents($url);
    
        $datosmapa = json_decode($datosjson, true);

        if($datosmapa['status'] =='OK'){
 
            $latitud = $datosmapa['results'][0]['geometry']['location']['lat']; 
            $longitud = $datosmapa['results'][0]['geometry']['location']['lng'];
            $localizacion = $datosmapa['results'][0]['formatted_address'];
            $datosmapa = array();             
            array_push($datosmapa,$latitud,$longitud,$localizacion);           
 
            return $datosmapa;           
 
        }else{
        	return false;
        }
    }
}