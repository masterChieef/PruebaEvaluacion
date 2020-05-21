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


Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Pruebas
Route::get('/prueba','InicioController@prueba');

//Bienvenida    
Route::get('/admin','HomeController@index')->name('inicio');
Route::group(['prefix' => 'admin', 'namespace'=>'Admin','middleware'=>'auth'], function () {
    
    

    //vista de vista de cada uno de los elementos primeras vistas una vez logueados
    Route::get('/item', 'ItemController@index')->name('Items');
    Route::get('/categoria', 'CategoriaController@index')->name('Categoria');
    Route::get('/respuesta', 'RespuestaController@index')->name('Respuesta');    
    Route::get('/pregunta', 'PreguntasVsItemsController@index')->name('Pregunta');
    /**
     *
     * Vistas de pantalla de los formularios 
     *
     */
    Route::get('/item/crear', 'ItemController@crear')->name('Items_crear');
    Route::get('/categoria/crear','CategoriaController@crear')->name('Categoria.crear');
    Route::get('/respuesta/crear', 'RespuestaController@crear')->name('Respuesta.crear');    
    Route::get('/pregunta/crear', 'PreguntasVsItemsController@crear')->name('Pregunta.crear');

    /* 
    *
    *Vista de  editar (formulario)
    *
    */

    Route::get('/items/{id}','ItemController@editar')->name('Items.editar');
    Route::get('/categoria/{id}','CategoriaController@editar')->name('Categoria.editar');
    Route::get('/respuesta/{id}', 'RespuestaController@editar')->name('Respuesta.editar');
    Route::get('/pregunta/{id}', 'PreguntasVsItemsController@editar')->name('Pregunta.editar');
    
    /** 
    * 
    *Peticiones de post  
    * 
    **/
    
    Route::post('/item','ItemController@guardar')->name('guardar.item');
    Route::post('/categoria', 'CategoriaController@guardar')->name('guardar.categoria');
    Route::post('/respuesta', 'RespuestaController@guardar')->name('guardar.respuesta');    
    Route::post('/pregunta', 'PreguntasVsItemsController@guardar')->name('guardar.pregunta');
      
    /** 
     * 
     *  peticiones put 
     * 
     **/    
    
     Route::put('/item/{id}', 'ItemController@update' )->name('Items.actualizar');
     Route::put('/categoria/{id}', 'CategoriaController@update')->name('Categoria.actualizar');
     Route::put('/respuesta/{id}', 'RespuestaController@update')->name('Respuesta.actualizar');    
     Route::put('/pregunta/{id}', 'PreguntasVsItemsController@update')->name('Pregunta.actualizar');
     
     /** 
     * 
     * peticiones delete
     * */
    
     Route::delete('/item/{id}', 'ItemController@destroy')->name('Items.eliminar');
     Route::delete('/categoria/{id}', 'CategoriaController@destroy')->name('Categoria.eliminar');
     Route::delete('/respuesta/{id}', 'RespuestaController@destroy')->name('Respuesta.eliminar');    
     Route::delete('/pregunta/{id}', 'PreguntasVsItemsController@destroy')->name('Pregunta.eliminar');
     
});