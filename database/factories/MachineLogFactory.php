<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\MachineLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineLogFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'machine_id' => Machine::factory(),
            'user_id'    => User::factory(),
            'content'    => $this->faker->paragraphs(3, true),
        ];
    }
}
