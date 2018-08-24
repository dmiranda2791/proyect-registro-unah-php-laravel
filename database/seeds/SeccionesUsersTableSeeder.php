<?php

use Illuminate\Database\Seeder;
use App\User;

class SeccionesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = DB::table('users')->select('id')->get();
        $seccionesIds = DB::table('secciones')->select('id')->get();

        for ($i = 0; $i < sizeof($seccionesIds); $i++) {
            DB::table('secciones_users')->insert([
                'user_id' => $userIds[0]->id,
                'seccion_id' => $seccionesIds[$i]->id,
                'calificacion' => rand(70, 100)
            ]);
        }
    }
}
