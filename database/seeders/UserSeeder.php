<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'     => 'Kit R.',
            'username' => 'kitrenner',
            'email'    => 'kit.renner@icloud.com',
        ]);
    }
}
