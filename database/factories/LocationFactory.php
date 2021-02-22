<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\LocationGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'location_group_id' => LocationGroup::factory(),
            'name'              => $this->faker->name(),
            'description'       => $this->faker->text(),
        ];
    }
}
