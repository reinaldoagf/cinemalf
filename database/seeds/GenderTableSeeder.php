<?php

use Illuminate\Database\Seeder;
use Cinema\Gender;
class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gender::create(['genre'=>'Suspenso']);
        Gender::create(['genre'=>'Terror']);
        Gender::create(['genre'=>'Acción']);
        Gender::create(['genre'=>'Comedia']);
    }
}
