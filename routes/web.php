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

Route::get('inicio',function(){
	return view('inicio');
});

Route::get('createUsu',function(){
	return view('usuario.createUsuario');
});

Route::get('editUsu',function(){
	return view('usuario.editUsuario');
});

Route::get('usu',function(){
	return view('usuario.usuario');
});