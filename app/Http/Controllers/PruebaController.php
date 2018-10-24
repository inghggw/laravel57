<?php
//Area de trabajo 
namespace App\Http\Controllers;
//Importar Clase padre de los controller
use App\Http\Controllers\Controller;

class PruebaController extends Controller{

	public function index(){
		return view('inicio');
	}

	public function create(){
		return view('usuario.createUsuario');
	}

	public function edit(){
		return view('usuario.editUsuario');
	}

	public function show(){
		return view('usuario.usuario');
	}

	static function usuarios(){
		return ['usuarios'=>[
					['id'=>1,'nombre'=>'Marcos Perez','correo'=>'mperez@gmail.com'],
					['id'=>2,'nombre'=>'Alvaro Montero','correo'=>'amontero@gmail.com'],
					['id'=>3,'nombre'=>'Danovis Banguero','correo'=>'dbanguero@gmail.com'],
				]];
	}
}