<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AuthLog;
use App\Models\User;

class AuthLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AuthLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'blame_on_user_id' => User::factory(),
            'ip_address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'session_id' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'user_agent' => $this->faker->text(),
            'killed_from_console' => $this->faker->boolean(),
            'logged_out_at' => $this->faker->dateTime(),
        ];
    }
}
