<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::Create([
            'name'=>'Dni'
        ]);
        Document::Create([
            'name'=>'Ruc'
        ]);
        Document::Create([
            'name'=>'CE'
        ]);
    }
}
