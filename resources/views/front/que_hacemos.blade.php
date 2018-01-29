@extends('layouts.master_home')

@section('css')
    @parent
@endsection

@section('content')


<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <img src="{{ asset('img/hacemos.png') }}" class="img-fluid" alt="cabecera-valorizacion">
    </div>
  </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>¿Que Hacemos?</h1>
            <ul class="mt-4" style="list-style:none; line-height:3rem;">

                <li>
                    <span class="text-warning">a)</span> Determinamos la valoración técnica comercial del inmueble <span class="text-warning">(Valoración Transaccional).</span> 
                </li>
                <li>
                    <span class="text-warning">b)</span><span class="text-warning"> Diseñamos procedimientos que permitan mejorar los niveles de rentabilidad, eficiencia y eficacia,</span>  tanto en el manejo y coordinación de las actividades de comercialización del inmueble, como en cada una de las disciplinas, especialidades y talentos que concurren.
                </li>
                <li>
                    <span class="text-warning">c)</span> Desarrollamos  la estrategia comercial <span class="text-warning">(Plan de marketing Move and Life)</span> , que nos permite obtener el mejor  cliente comprador o arrendatario, al mejor precio de mercado y en el menor tiempo posible. 
                </li>
                <li>
                    <span class="text-warning">d)</span> Si es necesario, <span class="text-warning">diseñamos un proceso de “Licitación Privada”</span>, lo que nos permite, en la mayoría de los casos, lograr precios superiores a lo esperado. Llevamos a un gran proceso de venta cualquier propiedad.
                </li>
                <li>
                    <span class="text-warning">e)</span> <span class="text-warning"> Buscamos el cliente apropiado</span> para cerrar el negocio de la propiedad, de manera segura.
                </li>
                <li>
                    <span class="text-warning">f)</span><span class="text-warning"> Desarrollamos un Sistema de Marketing</span> de comercialización orientado al perfil del cliente y la propiedad.
                </li>
                <li>
                    <span class="text-warning">g)</span><span class="text-warning"> Realizamos Presentaciones Profesionales</span>  para comercializar el inmueble.
                </li>
                <li>
                    <span class="text-warning">h)</span> Gracias a nuestro sistema colaborativo,  <span class="text-warning">coordinamos al mejor equipo profesional</span> para cada cliente y su propiedad. 
                </li>
            </ul>
            <p>
              A través de acuerdos comerciales con otras empresas y corredores  de la industria, cada propiedad es promocionada  a través del más amplio grupo profesional del mercado. Sin embargo, solo un equipo especializado es quien atiende al propietario, concentrando todo el foco el mayor conocimiento de cada negocio o propiedad. Sus usos, posibilidades y oportunidades, entre otros aspectos relevantes 
            <br>
            <br>
              ¡Respetamos mucho nuestro tiempo y el de nuestros clientes! Diseñamos una operación comercial segura, que nos permite avanzar con agilidad y ganar tiempo en cada gestión.
            </p>
        </div>
    </div>
</div>
    

@endsection

@section('js')
  @parent
@stop
