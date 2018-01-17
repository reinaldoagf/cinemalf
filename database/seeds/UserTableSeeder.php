<?php

use Illuminate\Database\Seeder;
use Cinema\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'email', 'password','typeofuser'
        User::create(['name'=>'reinaldo',
        	'email'=>'reinaldo@correo.com', 
        	'password'=>'reinaldo',
        	'typeofuser'=>'Administrador',
        	'remember_token' => str_random(10),
        	]);
        factory(User::class,10)->create();
    }
}
