<?php

use Illuminate\Database\Seeder;
use App\Seccion;
use App\Clase;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clases = DB::table('clases')->select('id')->get();

        for ($i = 0; $i < sizeof($clases); $i++) {
            Seccion::create([
                'clase_id' => $clases[$i]->id,
                'periodo' => 1,
                'anio' => 2018
            ]);
        }
    }
}
