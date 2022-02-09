<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\Check;
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
        Box::factory(8)
            ->has(Set::factory(5)
                ->has(Check::factory(3)))
            ->create();
    }
}
