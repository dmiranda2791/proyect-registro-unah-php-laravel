<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cuenta' => '20142100023',
            'name' => 'Karol Quintanilla',
            'email' => 'karolkin10@gmail.com',
            'password' => Hash::make('hola1234'),
            'carrera' => 'Ingeniería en Sistemas',
            'centro' => 'UNAH'
        ]);
    }
}
