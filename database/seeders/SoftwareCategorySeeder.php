<?php

namespace Database\Seeders;

use App\Models\SoftwareCategory;
use Illuminate\Database\Seeder;

class SoftwareCategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        SoftwareCategory::factory()->count(5)->create();
    }
}
