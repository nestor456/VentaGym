<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::Create([
            'name'=>'Masculino'
        ]);
        Gender::Create([
            'name'=>'Femenino'
        ]);
        Gender::Create([
            'name'=>'Otros'
        ]);
    }
}
