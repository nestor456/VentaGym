<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(PagoSeeder::class);

       $this->call(DocumentSeeder::class);
       $this->call(GendersSeeder::class);

       $this->call(DepartamentorSeeder::class);
       $this->call(ProvinciaSeeder::class);
       $this->call(DistritoSeeder::class);
    }
}
