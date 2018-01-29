<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Post;
use Image;
use App\Http\Controllers\ImagenController as Imagen;


class PostController extends Controller
{
    private $form_rules = [
        'titulo'       => 'required',
        'descripcion_corta'  => 'required',
        'texto'       => 'required',
    ];

    private $mensajes_rules = [
        'titulo.required'           => 'El titulo del post es requerido.<br>',        
        'descripcion_corta.required'      => 'Una breve descripción es requerida.<br>',
        'texto.required'           => 'El texto del post es requerido.<br>',
    ];

    public function index()
    {
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $file = $request->file('imagen');
            $img = 'default.png';

            if(isset($file)){
                new Imagen($file,'/img/posts/','/img/posts/thumbnails/',200,200);
                $img = $file->getClientOriginalName();
            }

            $post                    = new Post();
            $post->titulo            = $request->input('titulo');
            $post->descripcion_corta = $request->input('descripcion_corta');
            $post->texto             = $request->input('texto');
            $post->imagen            = $img;
            $post->save();

            return new JsonResponse([
                        'msj' => 'Post guardado exitosamente!!!',
                        'type' => 'success'
                    ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
