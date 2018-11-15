<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ruta del archivo
        $file = database_path('json/item.json');
        //incluir archivo json
        $json = file_get_contents($file);
        //recorrer el json
        foreach(json_decode($json) as $row){
        	//crear cada fila del json en la BD
        	DB::table('item')->insert([
         	'item_id' => $row->item_id,
            'item' => $row->item,
            'ruta' => $row->ruta,
            'icono' => $row->icono,
            ]);
        }
    }
}