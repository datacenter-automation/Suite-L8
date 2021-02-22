<?php

namespace Database\Factories;

use App\Models\Internal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InternalFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->safeEmail(),
            'email_verified_at' => $this->faker->randomElement([now(), null]),
            'salt'              => Str::random(30),
            'password'          => bcrypt('password'),
            'blocked_at'        => $this->faker->randomElement([now(), null]),
        ];
    }
}
