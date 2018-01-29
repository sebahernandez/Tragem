<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index');
Route::get('/buscar','FrontController@search');
Route::post('/buscar','FrontController@search');
Route::get('/detalles-de-la-propiedad/{id}','FrontController@detalles');
Route::get('/que-hacemos','FrontController@hacemos');
Route::get('/nuestro-modelo','FrontController@modelo');
Route::get('/quiero-mi-oficina','FrontController@oficina');
Route::get('/quiero-ser-agente-asociado','FrontController@agenteAsociado');
Route::get('/quiero-ser-corredor-asociado','FrontController@corredorAsociado');
Route::get('/valorizacion-transaccional','FrontController@valorizacion');
Route::post('/obtener-mapa','CoordenadasController@obtener_coordenadas');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/propiedades', 'PropiedadesController@index')->name('propiedades');
Route::get('/propiedades/agregar', 'PropiedadesController@create');
Route::post('/propiedades/store', 'PropiedadesController@store');
Route::get('/propiedades/edit/{id}', 'PropiedadesController@edit');
Route::post('/propiedades/update', 'PropiedadesController@update');
Route::post('/eliminar-propiedad', 'PropiedadesController@destroy');
Route::post('/arrienda-propiedad', 'PropiedadesController@arrienda');

Route::post('/getProvincias','PropiedadesController@getProvincias');
Route::post('/getComunas','PropiedadesController@getComunas');

Route::post('/obtener_coordenadas','CoordenadasController@obtener_coordenadas');

Route::any('filepicker', 'FilepickerController@handle');
Route::post('/delete-img-propiedad','FilepickerController@deleteImg');


Route::group(['middleware' => ['auth']], function () {

    /*Route::get('usuarios', ['uses' => 'UsuariosController@index', 'as' => 'usuarios']);
    Route::get('crear-usuario', ['uses' => 'UsuariosController@create', 'as' => 'usuario.create']);
    Route::get('editar-usuario/{id}', ['uses' => 'UsuariosController@edit', 'as' => 'usuario.edit']);
    Route::post('actualizar-usuario/{id}', ['uses' => 'UsuariosController@update', 'as' => 'usuario.update']);
    Route::post('eliminar-usuario', ['uses' => 'UsuariosController@destroy', 'as' => 'usuario.destroy']);

    Route::get('propiedades-de-agentes', ['uses' => 'PropiedadesController@deAgentes', 'as' => 'propiedades.agente']);*/
    Route::get('post', ['uses' => 'PostController@index', 'as' => 'posts']);
    Route::get('post-nuevo', ['uses' => 'PostController@create', 'as' => 'post.nuevo']);
    Route::post('post-guardar', ['uses' => 'PostController@store', 'as' => 'post.store']);
});