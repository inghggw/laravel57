<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert([
         	['nombre' => 'aprendiz'],
    		['nombre' => 'instructor'],
    		['nombre' => 'cordinador'],
        ]);
    }
}
