<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\Set;
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
         Box::factory(10)->has(Set::factory(10))->create();
    }
}
