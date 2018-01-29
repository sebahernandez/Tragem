<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Propiedad;
use App\Region;
use App\Provincia;
use App\Comuna;
use App\User;

class PropiedadesController extends Controller
{
    private $form_rules = [
        'nombre'       => 'required',
        'descripcion'  => 'required',
        'precio'       => 'required|numeric',
        'habitaciones' => 'required|numeric',
        'banios'       => 'required|numeric',
        'garages'      => 'required|numeric',
        'img_destacada'=> 'required',
    ];

    private $mensajes_rules = [
        'precio.required'           => 'El precio es requerido.<br>',
        'precio.numeric'            => 'El precio debe ser numerico.<br>',
        'habitaciones.required'     => 'El número de habitaciones es requerido.<br>',
        'habitaciones.numeric'      => 'El número de habitaciones debe ser numerico.<br>',
        'banios.required'           => 'El número de baños es requerido.<br>',
        'banios.numeric'            => 'El número de baños debe ser numerico.<br>',
        'garages.required'          => 'El número de estacionamientos es requerido.<br>',
        'garages.numeric'           => 'El número de estacionamientos debe ser numerico.<br>',
        'nombre.required'           => 'El nombre de la propiedad es requerido.<br>',        
        'descripcion.required'      => 'Una breve descripción es requerida.<br>',
        'img_destacada.required'    => 'Debe seleccionar una imágen como destacada.<br>',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(Request $request)
    {
        $filter = $request->get('filter');

        if ($filter && $filter != '') {

            switch ($filter) {
                case 'casa':
                    $propiedades = Propiedad::select('*')->where('clase','casa')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                case 'arriendo':
                    $propiedades = Propiedad::select('*')->where('clase','arriendo')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                case 'comercial':
                    $propiedades = Propiedad::select('*')->where('clase','comercial')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                case 'departamento':
                    $propiedades = Propiedad::select('*')->where('clase','departamento')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                case 'terreno':
                    $propiedades = Propiedad::select('*')->where('clase','terreno')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                case 'destacada':
                    $propiedades = Propiedad::select('*')->where('tipo','destacada')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    break;
                default:
                    $propiedades = Propiedad::select('*')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
                    
                    break;
            }
        }else{

            $propiedades = Propiedad::select('*')->orderBy('id','DESC')->paginate(8);//->where('user_id', $request->user()->id)
            
        }
        
        if($request->ajax()){
            return response()->json(view('admin.propiedades.indexAjaxPagination',compact('propiedades', 'filter'))->render());
        }
        return view('admin.propiedades.index', compact('propiedades', 'filter'));
    }

   /* public function deAgentes(Request $request)
    {
        $filter = $request->get('filter');
        $agente = $request->get('idAgente');

        $agentes = User::where('id','!=',$request->user()->id)->get();

        if ($filter && $filter != '') {

            switch ($filter) {
                case 'casa':
                    $propiedades = Propiedad::select('*')->where('clase','casa')->where('user_id', '!=',$request->user()->id)->orderBy('id','DESC')->paginate(8);
                    break;
                case 'arriendo':
                    $propiedades = Propiedad::select('*')->where('clase','arriendo')->where('user_id', '!=',$request->user()->id)->orderBy('id','DESC')->paginate(8);
                    break;
                case 'comercial':
                    $propiedades = Propiedad::select('*')->where('clase','comercial')->where('user_id', '!=',$request->user()->id)->orderBy('id','DESC')->paginate(8);
                    break;
                case 'departamento':
                    $propiedades = Propiedad::select('*')->where('clase','departamento')->where('user_id', '!=',$request->user()->id)->orderBy('id','DESC')->paginate(8);
                    break;
                case 'terreno':
                    $propiedades = Propiedad::select('*')->where('clase','terreno')->where('user_id', '!=',$request->user()->id)->orderBy('id','DESC')->paginate(8);
                    break;
                case 'agente':
                    $propiedades = Propiedad::select('*')->where('user_id', $agente)->orderBy('id','DESC')->paginate(8);
                    break;
                default:
                    $propiedades = Propiedad::select('*')->where('user_id','!=', $request->user()->id)->orderBy('id','DESC')->paginate(8);
                    
                    break;
            }
        }else{

            $propiedades = Propiedad::select('*')->where('user_id','!=', $request->user()->id)->orderBy('id','DESC')->paginate(8);
            
        }
        
        if($request->ajax()){
            return response()->json(view('admin.propiedades.indexAjaxPagination',compact('propiedades', 'filter','agentes'))->render());
        }
        return view('admin.propiedades.index', compact('propiedades', 'filter','agentes'));
    }*/

    public function create()
    {
        $regiones = Region::all();
        return view('admin.propiedades.create',compact('regiones'));
    }

    public function getProvincias(Request $request)
    {
        if ($request->ajax()) {

            $data=$request->all();
            return new JsonResponse([
                        'provincias' => Provincia::where('idRegion', '=', $data['id_region'])->get(),
                        'type' => 'success'
                    ]);
        }
    }


    public function getComunas(Request $request)
    {
        if ($request->ajax()) {

            $data=$request->all();
            return new JsonResponse([
                        'comunas' => Comuna::where('idProvincia', '=', $data['id_provincia'])->get(),
                        'type' => 'success'
                    ]);
        }
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $validaciones =  $this->form_rules;
            $mensajes     = $this->mensajes_rules;

            $validacion = Validator::make($data, $validaciones, $mensajes);

            if ($validacion->fails())
            {
                 $errores = $validacion->errors(); 
                 return new JsonResponse($errores, 422);                 
            }

            $result = $this->getJsonImagenes($data);

            if(is_string($result) && is_array(json_decode($result, true)) && (json_last_error() == JSON_ERROR_NONE))
            {
               $jsonImagenes = $result; 
            }else{
                return new JsonResponse($result);
            }

            /*$estado = 0;

            if($request->user()->rol == 'admin')
            {
                $estado = $request->input('estado');
            }*/

            $propiedad                   = new Propiedad();
            $propiedad->nombre           = $request->input('nombre');
            $propiedad->descripcion      = $request->input('descripcion');
            $propiedad->lat              = $request->input('lat');
            $propiedad->lon              = $request->input('lon');
            $propiedad->direccion        = $request->input('direccion');
            $propiedad->tbl_region_id    = $request->input('region');
            $propiedad->tbl_provincia_id = $request->input('provincia');
            $propiedad->tbl_comuna_id    = $request->input('comuna');
            $propiedad->habitaciones     = $request->input('habitaciones');
            $propiedad->banios           = $request->input('banios');
            $propiedad->garages          = $request->input('garages');
            $propiedad->superficie       = $request->input('superficie');
            $propiedad->precio           = $request->input('precio');
            $propiedad->features         = $jsonImagenes;
            $propiedad->img_destacada    = str_replace("'", "", $request->input('img_destacada'));
            $propiedad->estado           = $request->input('estado');
            $propiedad->tipo             = $request->input('tipo');
            $propiedad->clase            = $request->input('clase');
            $propiedad->user_id          = \Auth::user()->id;
            $propiedad->save();

            return new JsonResponse([
                        'msj' => 'Propiedad guardada exitosamente!!!',
                        'type' => 'success'
                    ]);
        }
    }

    private function getJsonImagenes($data)
    {
        $deletes = $adds = [];

        $explode = explode( ',',$data['deletes']);
        $num = 0;
        for ($i=0; $i < count($explode); $i++) { 
            if($explode[$i] != '-1')
            {
                $deletes[$num] = $explode[$i];
                $num++;
            }
        }

        $explode = explode( ',',$data['adds']);
        $num = 0;
        for ($a=0; $a < count($explode); $a++) { 
            if($explode[$a] != '-1')
            {
                $adds[$num] = $explode[$a];
                $num++;
            }
        }

        $num = 0;
        for ($b=0; $b < count($adds); $b++) { 

            if(!in_array($adds[$b], $deletes))
            {
                $imgs[$num] = str_replace("'", "", $data['feature_images_'.$adds[$b]]);
                $num++;
            }
        }

        if(!isset($imgs)||count($imgs)<2)
        {
            $dataImagenes['type'] = 'error';
            $dataImagenes['msj']  = 'Debe subir un mínimo de dos imágenes por propiedad!!';
            return $dataImagenes;
        }else{
            $array['images'] = $imgs;
            return json_encode($array);
        }
    }

    public function edit($id)
    {
        $regiones = Region::all();
        $propiedad = Propiedad::findOrFail($id);

        return view('admin.propiedades.edit',compact('regiones','propiedad'));
        /*if(\Auth::user()->id == $propiedad->user_id){
            return view('admin.propiedades.edit',compact('regiones','propiedad'));
        }else{
            return view('error.nopermitido');
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $validaciones =  $this->form_rules;
            $mensajes     = $this->mensajes_rules;

            $validacion = Validator::make($data, $validaciones, $mensajes);

            if ($validacion->fails())
            {
                 $errores = $validacion->errors(); 
                 return new JsonResponse($errores, 422);                 
            }

            $result = $this->getJsonImagenes($data);

            if(is_string($result) && is_array(json_decode($result, true)) && (json_last_error() == JSON_ERROR_NONE))
            {
               $jsonImagenes = $result; 
            }else{
                return new JsonResponse($result);
            }

            /*$estado = 0;

            if($request->user()->rol == 'admin')
            {
                $estado = $request->input('estado');
            }*/

            $propiedad                   = Propiedad::find($request->input('idPropiedad'));
            $propiedad->nombre           = $request->input('nombre');
            $propiedad->descripcion      = $request->input('descripcion');
            $propiedad->lat              = $request->input('lat');
            $propiedad->lon              = $request->input('lon');
            $propiedad->direccion        = $request->input('direccion');
            $propiedad->tbl_region_id    = $request->input('region');
            $propiedad->tbl_provincia_id = $request->input('provincia');
            $propiedad->tbl_comuna_id    = $request->input('comuna');
            $propiedad->habitaciones     = $request->input('habitaciones');
            $propiedad->banios           = $request->input('banios');
            $propiedad->garages          = $request->input('garages');
            $propiedad->superficie       = $request->input('superficie');
            $propiedad->precio           = $request->input('precio');
            $propiedad->features         = $jsonImagenes;
            $propiedad->img_destacada    = str_replace("'", "", $request->input('img_destacada'));
            $propiedad->estado           = $request->input('estado');
            $propiedad->tipo             = $request->input('tipo');
            $propiedad->clase            = $request->input('clase');
            $propiedad->save();

            return new JsonResponse([
                        'msj' => 'Propiedad editada exitosamente!!!',
                        'type' => 'success'
                    ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $p = Propiedad::findOrFail($data['id']);

            //if($request->user()->id == $p->user_id){
            if($p){
                $p->delete();

                return new JsonResponse([
                            'msj' => 'Propiedad eliminada exitosamente!!!',
                            'type' => 'success'
                        ]);
            }else{
                return new JsonResponse([
                            'msj' => 'No se puede eliminar la propiedad!!!',
                            'type' => 'error'
                        ],422);
            }
        }
    }

    public function arrienda(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $p = Propiedad::find($data['id']);
            //if($request->user()->id == $p->user_id){
            if($p){
               $p->arrendada = !$p->arrendada;

                $p->save();

                return new JsonResponse([
                            'msj' => 'Arriendo actualizado exitosamente!!!',
                            'type' => 'success'
                        ]);
            }else{
                return new JsonResponse([
                            'msj' => 'No se puede cambiar el arriendo a la propiedad!!!',
                            'type' => 'error'
                        ],422);
            }
        }
    }
}
