<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategories;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategories::Create([
            'name'=>'No tiene sub categoria',
            'description'=>'no tiene',
        ]);
    }
}
