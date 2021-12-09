<?php

namespace Database\Seeders;

use App\Models\Pagos;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pagos::Create([
            'name'=>'Al contado'
        ]);
        Pagos::Create([
            'name'=>'Credito'
        ]);
    }
}
