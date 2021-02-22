<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\Software;
use App\Models\SoftwareInstalled;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoftwareInstalledFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SoftwareInstalled::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'software_id' => Software::factory(),
            'machine_id'  => Machine::factory(),
        ];
    }
}
