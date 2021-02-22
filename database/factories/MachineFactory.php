<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Machine;
use App\Models\MachineType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Machine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'machine_type_id' => MachineType::factory(),
            'location_id'     => Location::factory(),
            'user_id'         => User::factory(),
            'name'            => $this->faker->name(),
        ];
    }
}
