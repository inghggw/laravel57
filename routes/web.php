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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pru',function(){
	//echo 'probando la ruta';
	$aDatos = ['nombre'=>'marcos',
			   'apellido'=>'perez'];
	return view('prueba',$aDatos);
});

Route::get('inicio','PruebaController@index');

Route::get('createUsu','PruebaController@create');

Route::get('editUsu','PruebaController@edit');

Route::get('usu','PruebaController@show');

Route::resource('usuario','UsuarioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');