<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Ruta del archivo
        $file = database_path('json/usuarios.json');
        //Incluir archivo json
        $json = file_get_contents($file);
        //Recorrer el json
        foreach (json_decode($json) as $row) {
            //Crear cada fila del json en la BD
            DB::table('usuario')->insert([
                'primer_nombre'=>$row->primer_nombre,
                'segundo_nombre'=>$row->segundo_nombre,
                'primer_apellido'=>$row->primer_apellido,
                'segundo_apellido'=>$row->segundo_apellido,
                'correo'=>$row->correo,
                'password'=>$row->password,
                'fecha_nacimiento'=>$row->fecha_nacimiento,
                'estado_id'=>$row->estado_id
            ]);
        }
    }
}
