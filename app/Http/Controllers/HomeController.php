<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activas   = Propiedad::where('estado',1)->where('user_id', $request->user()->id)->count();
        $inactivas = Propiedad::where('estado',0)->where('user_id', $request->user()->id)->count();
        $premium_activas   = Propiedad::where('estado',1)->where('tipo','premium')->where('user_id', $request->user()->id)->count();
        $premium_inactivas   = Propiedad::where('estado',0)->where('tipo','premium')->where('user_id', $request->user()->id)->count();
        $classic_activas   = Propiedad::where('estado',1)->where('tipo','classic')->where('user_id', $request->user()->id)->count();
        $classic_inactivas   = Propiedad::where('estado',0)->where('tipo','classic')->where('user_id', $request->user()->id)->count();        
        $total     = Propiedad::where('user_id', $request->user()->id)->count();
        
        $propiedades_de_agentes     = Propiedad::where('user_id', '!=', $request->user()->id)->count();

        $classic_agentes   = Propiedad::where('tipo','classic')->where('user_id','!=', $request->user()->id)->count();  
        $premium_agentes   = Propiedad::where('tipo','premium')->where('user_id','!=', $request->user()->id)->count();     

        return view('home',compact('activas','inactivas','total','premium_activas','premium_inactivas','classic_activas','classic_inactivas','propiedades_de_agentes','classic_agentes','premium_agentes'));
    }
}
