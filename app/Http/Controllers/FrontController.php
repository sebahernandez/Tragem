<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Propiedad;

class FrontController extends Controller
{
     use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/propiedades';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $propiedades_destacadas = Propiedad::where('tipo', 'destacada')->where('estado',1)->orderBy('id','DESC')->paginate(8);  
        $propiedades_arriendos  = Propiedad::where('clase', 'arriendo')
                                            ->where('arrendada',false)
                                            ->where('estado',1)
                                            ->orderBy('id','DESC')
                                            ->paginate(4);       

       /* if($request->ajax()){
            return response()->json(view('front.propiedades_destacadas',compact('propiedades_destacadas'))->render());
        }

        $propiedades_premium = Propiedad::where('tipo', 'premium')->where('estado',1)->orderBy('id','DESC')->get();*/
        return view('welcome', compact('propiedades_destacadas','propiedades_arriendos'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {

            $data=$request->all();

            $clase = $data['clase'];
            $habitaciones = $data['habitaciones'];
            $banios = $data['banios'];
            $garages = $data['garages'];

            $propiedades = Propiedad::where(function ($query) use ($clase,$habitaciones,$banios,$garages) {
                                        if($clase != '-1') $query->where('clase',$clase);
                                        if($habitaciones != '-1') $query->where('habitaciones',$habitaciones);
                                        if($banios != '-1') $query->where('banios',$banios);
                                        if($garages != '-1') $query->where('garages',$garages);
                                    })
                                    ->where('estado', 1)
                                    ->orderBy('id','DESC')
                                    ->paginate(9);

            if(isset($propiedades)&&count($propiedades))
            {
                return response()->json(view('front.list_search',compact('propiedades','clase','habitaciones','banios','garages'))->render());
            }else{

                return new JsonResponse([
                        'msj' => 'NO SE ENCONTRARON PROPIEDADES',
                        'type' => 'error'
                    ]);
            }
            
        }
    }

    public function detalles($id)
    {
        $propiedad = Propiedad::find($id);

        if(isset($propiedad))
        {
            return view('front.detalles',compact('propiedad'));
        }else{
            return redirect()->action('FrontController@index');;
        }
    }

    public function hacemos()
    {
        return view('front.que_hacemos');
    }

    public function modelo()
    {
        return view('front.nuestro_modelo');
    }

    public function valorizacion()
    {
        return view('front.valorizacion_transaccional');
    }

    public function oficina()
    {
        return view('front.oficina');
    }

    public function agenteAsociado()
    {
        return view('front.asociado');
    }

    public function corredorAsociado()
    {
        return view('front.corredor');
    }

}
