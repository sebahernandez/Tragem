@extends('layouts.master_home')

@section('css')
    @parent
@endsection

@section('content')
    

<div class="container">
  <div class="row mt-5">
    <div class="col">

      <h1>Quiero ser agente</h1>
      <p style="text-align:justify;">
        Es un modelo creado para personas con o sin experiencia en el mundo inmobiliario que necesiten de un asesoramiento en la creación, 
        puesta en marcha y operación de una oficina comercial en la comuna que estimen conveniente. Esto incluirá el acompañamiento y
         desarrollo de los nuevos miembros de la red, Agente de Oficina y la mejor disposición del programa de entrenamiento y control, a un costo bajo en relación a proyectos de similares características.<br>

        Es un modelo creado para personas con o sin experiencia en el mundo inmobiliario que necesiten de un asesoramiento en la creación, 
        puesta en marcha y operación de una oficina comercial en la comuna que estimen conveniente. Esto incluirá el acompañamiento y desarrollo 
        de los nuevos miembros de la red, Agente de Oficina y la mejor disposición del programa de entrenamiento y control, a un costo bajo en 
        relación a proyectos de similares características.
        <br>
        <br>
        Solicita una reunión con algún miembro del equipo ejecutivo completando el formulario en nuestra web.
      </p>

      <div class="col-md-6 " style="background-color: #f0f0f0;padding: 2px 55px 15px 55px">
            @include('front.formulario')       
        </div>

    </div>
  </div>
</div>

@endsection

@section('js')
  @parent
@stop
