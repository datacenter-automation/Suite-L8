<?php

namespace Database\Factories;

use App\Models\Whitegloves;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WhiteglovesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Whitegloves::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name'      => $this->faker->company(),
            'email'             => $this->faker->safeEmail(),
            'email_verified_at' => $this->faker->randomElement([now(), null]),
            'salt'              => Str::random(30),
            'password'          => bcrypt('password'),
            'blocked_at'        => $this->faker->randomElement([now(), null]),
        ];
    }
}
