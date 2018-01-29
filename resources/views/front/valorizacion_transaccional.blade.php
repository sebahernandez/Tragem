@extends('layouts.master_home')

@section('css')
    @parent
@endsection

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <img src="{{ asset('img/cabecera-valorizacion.png') }}" class="img-fluid" alt="cabecera-valorizacion">
    </div>
  </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12"><h1>VALORIZACIÓN TRANSACCIONAL</h1>
            <p>Es un completo informe que, entre otros datos, nos indica el precio que el 
                mercado esta dispuesto a pagar por una propiedad determinada.
            </p>
        </div>
        <div class="col-12">
            <img src="{{ asset('img/c-valorizacion.png') }}" class="img-fluid" alt="valorizacion move and life">

            <p class="mt-4">Incluye el Análisis de la normativa, atingente respecto a la constructibilidad, uso, cabida, entre otros aspectos importantes a considerar.
            Si corresponde para la propiedad, consideramos realizar el  estudio de factibilidad de proyectos inmobiliarios posibles, tomando en cuenta variables técnicas, 
            económicas, legales, financieras, políticas y de gestión.<br>
            <br>
            Nuestro Informe de Valoración Transaccional, a diferencia de una tasación, considera transacciones reales debidamente 
            inscritas en el Conservador de Bienes Raíces.
            Una tasación tradicional utiliza menos información y por lo general, 
            tampoco considera las transacciones reales de compraventa de  inmuebles similares en una misma área. Sólo muestra valores de oferta de propiedades, 
            sin embargo, no ahonda en mayores detalles del inmueble, ni propone estrategia comercial de venta.</p>
        </div>

        <div class="col-md-4 offset-md-8">
            <div class="boton-t">
                <div class="aqui-t">
                    <a href="#">Diferencias principales<br> entre  
                Valoración  transaccional Move and Life  y Tasación Bancaria</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 d-none d-sm-block">
<div class="row">

<div class="col-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th class="table-active">Valoración Transaccional Move and life</th>
                <th class="table-active">Tasación Bancaria</th>           
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><img src="{{ asset('img/file.png') }}" width="50px" height="50px;" class="img-fluid"></th>
                <td>
                    Estudio profundo del inmueble, de sus potenciales usos y de sus mejores alternativas para ser comercializado.
                </td>
                <td>Informe estandar de un inmueble</td>          
            </tr>
            <tr>
                <th scope="row"><img src="{{ asset('img/light-bulb.png') }}" width="50px" height="50px;" alt="img-fluid"></th>
                <td >Realizado para identificar cual es la mejor alternativa para comercializar y presentar una "solución
                  inmobiliaria" a la medida de nuestro cliente.
                </td>
                <td>Realizado para indicar a la institución financiera si la propiedad es una garantia posible</td>
             
            </tr>
            <tr>
                <th scope="row"><img src="{{ asset('img/house.png') }}" width="50px" height="50px;" class="img-fluid"></th>
                <td>Realizado por una empresa tasadora externa para asegurar total independencia y objetividad. Los tasadores
                  externos utilizan la metodologia única MOVE AND LIFE de valoracion transaccional.
                </td>
                <td>Realizado de acuerdo a los criterios del banco, y que considera ciertos elementos que para esta institución
                  pueden ser riesgosos, como por ejemplo; las construcciones fuera de norma. (que incluso pueden ser demolidas). 
                  O edificaciones con elementos no asegurables (por ej. Construcciones de adobe).
                </td>
         
            </tr>

            <tr>
                <th scope="row"><img src="{{ asset('img/voucher.png') }}" width="50px" height="50px;" class="img-fluid"></th>
                <td>
                    Nuestro informe de centra, en el mejor precio que puede conseguir un propietario. Se define el mejor uso posible
                    para la propiedad y si es necesario, se desarrolla un proyecto de "solucion inmobiliario" para obtenerlo.
                    <br>
                    Asimismo indica cual es el valor que deberia ser tasada la propiedad por la institución financiera dentro de dicho 
                    informe técnico.
                </td>
                <td>
                  Los ajustes o "castigos", son identificados por las instituciones bancarias y que pueden hacer que el valor de garantia
                  de una propiedad, sea menor que el valor real de mercado, que es finalmente lo que un eventual comprador esta dispuesto
                  a pagar por un bien de determinados atributos.
                </td>       
            </tr>
            <tr>
                <th scope="row"><img src="img/bars.png" width="50px" height="50px;" class="img-fluid"></th>
                <td> 
  
                  Considera transacciones reales de mercado, debidamente inscrita en el conservador de bienes raices.
                  <br>
                 También muestra el movimiento del mercado, cuales son las ofertas publicadas y que propiedades "le compiten".
                </td>
                <td>
                    Considera ofertas de publicaciones de los distintos portales inmobiliarios.
                </td>
         
              </tr>
        </tbody>
    </table>
</div>



</div>
</div><!-- version pc -->

<!-- version movil -->

<div class="container d-md-none d-xl-none mt-5">
  <div class="row">
    <div class="col-12">

<h5>Valorización trasaccional Move and Life</h5>

<ul class="list-group">
  <li class="list-group-item">Estudio profundo del inmueble, de sus potenciales usos y de sus mejores
    alternativas para ser comercializado.</li>
  <li class="list-group-item">Realizado para identificar cual es la mejor alternativa para comercializar y presentar una "solución
    inmobiliaria" a la medida de nuestro cliente.</li>
  <li class="list-group-item">Realizado por una empresa tasadora externa para asegurar total independencia y objetividad. Los tasadores
    externos utilizan la metodologia única MOVE AND LIFE de valoracion transaccional.</li>
  <li class="list-group-item"> Nuestro informe de centra, en el mejor precio que puede conseguir un propietario. Se define el mejor uso posible
    para la propiedad y si es necesario, se desarrolla un proyecto de "solucion inmobiliario" para obtenerlo.
    <br>
    Asimismo indica cual es el valor que deberia ser tasada la propiedad por la institución financiera dentro de dicho 
    informe técnico.</li>
  <li class="list-group-item">Considera transacciones reales de mercado, debidamente inscrita en el conservador de bienes raices.
    <br>
   También muestra el movimiento del mercado, cuales son las ofertas publicadas y que propiedades "le compiten".</li>
</ul>

<h5 class="mt-5">Tasación Bancaria</h5>

<ul class="list-group">
  <li class="list-group-item">Informe estandar de un inmueble.</li>
  <li class="list-group-item">Realizado para indicar a la institución financiera si la propiedad es una garantia posible.</li>
  <li class="list-group-item">Realizado de acuerdo a los criterios del banco, y que considera ciertos elementos que para esta institución
    pueden ser riesgosos, como por ejemplo; las construcciones fuera de norma. (que incluso pueden ser demolidas). 
    O edificaciones con elementos no asegurables (por ej. Construcciones de adobe).</li>

  <li class="list-group-item"> Los ajustes o "castigos", son identificados por las instituciones bancarias y que pueden hacer que el valor de garantia
                  de una propiedad, sea menor que el valor real de mercado, que es finalmente lo que un eventual comprador esta dispuesto
                  a pagar por un bien de determinados atributos.</li>
  <li class="list-group-item">Considera ofertas de publicaciones de los distintos portales inmobiliarios.</li>
</ul>




    </div>
  </div>
</div>



@endsection

@section('js')
  @parent
@stop
