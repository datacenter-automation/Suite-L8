<?php

namespace Database\Seeders;

use App\Models\LocationGroup;
use Illuminate\Database\Seeder;

class LocationGroupSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        LocationGroup::factory()->count(5)->create();
    }
}
