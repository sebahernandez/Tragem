@extends('layouts.master_home')

@section('css')
    @parent
@endsection

@section('content')
    

<div class="container">
  <div class="row mt-5">
    <div class="col">
        <h1>Quiero ser agente asociado</h1>
        <p style="text-align:justify;">
            Es un modelo basado en la formación, acompañamiento y desarrollo de los nuevos miembros de nuestra red.
             En Move and Life tendrás a tu disposición el mejor programa de entrenamiento inmobiliario, formación 
             continua y plataforma comercial que hará efectivo el logro de tus metas personales y profesionales.
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
