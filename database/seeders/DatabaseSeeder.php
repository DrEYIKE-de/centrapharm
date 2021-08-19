<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Medicament;
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
        //App\Models\User::factory(10)->create();

         Medicament::factory(20)->create();
         Page::factory(20)->create();
    }
}
