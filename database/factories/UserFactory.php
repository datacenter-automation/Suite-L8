<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name(),
            'username'    => $this->faker->userName(),
            'email'       => $this->faker->safeEmail(),
            'salt'        => Str::random(30),
            'password'    => bcrypt('password'),
            'register_ip' => $this->faker->ipv4(),
        ];
    }
}
