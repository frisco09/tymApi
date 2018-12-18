<?php

use App\User;
//use App\Partido;
//use App\Resultado;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Partido::truncate();
        Resultado::truncate();

        User::flushEventListeners();
        Partido::flushEventListeners();
        Resultado::flushEventListeners();

        $cantidadPartidos = 50;
        $cantidadResultados = 50;

        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);

        factory(Partido::class, $cantidadPartidos)->create();
        factory(Resultado::class,$cantidadResultados)->create();
    }
}
