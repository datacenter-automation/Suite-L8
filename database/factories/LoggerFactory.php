<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Logger;
use App\Models\User;

class LoggerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Logger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'method' => $this->faker->word(),
            'controller' => $this->faker->word(),
            'action' => $this->faker->word(),
            'parameter' => '{}',
            'headers' => '{}',
            'origin_ip_address' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}
