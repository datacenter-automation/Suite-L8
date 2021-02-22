<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\MachineNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineNoteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineNote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'machine_id' => Machine::factory(),
            'content'    => $this->faker->paragraphs(3, true),
        ];
    }
}
