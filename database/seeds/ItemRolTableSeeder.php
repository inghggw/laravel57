<?php

use Illuminate\Database\Seeder;

class ItemRolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //ruta del archivo
        $file = database_path('json/item_rol.json');
        //incluir archivo json
        $json = file_get_contents($file);
        //recorrer el json
        foreach(json_decode($json) as $row){
        	//crear cada fila del json en la BD
        	DB::table('item_rol')->insert([
         	'item_id' => $row->item_id,
         	'rol_id' => $row->rol_id,
        ]);
        }
    }
}