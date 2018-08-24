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
            $periodo;

            if($i < 4) {
                $periodo = 1;
            } else {
                $periodo = 2;
            }
            
            Seccion::create([
                'clase_id' => $clases[$i]->id,
                'periodo' => $periodo,
                'anio' => 2018
            ]);
        }
    }
}
