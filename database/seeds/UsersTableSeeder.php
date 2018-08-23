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
            'name' => 'Daniel Miranda',
            'email' => 'dmiranda2791@gmail.com',
            'password' => Hash::make('hola1234'),
        ]);
    }
}
