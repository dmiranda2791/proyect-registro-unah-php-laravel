<?php

use Illuminate\Database\Seeder;
use App\Clase;

class ClasesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $clases = ["Español", "Matemáticas", "Bases de datos", "Sistemas Operativos"];
        // Create 50 product records
        for ($i = 0; $i < sizeof($clases); $i++) {
            Clase::create([
                'nombre' => $clases[$i],
            ]);
        }
    }
}
