<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadoTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(ItemRolTableSeeder::class);
        factory('App\Models\Usuario', 10000)->create();
    }
}
