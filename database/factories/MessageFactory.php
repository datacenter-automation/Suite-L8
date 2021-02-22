<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Models\User;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'from_user_id' => User::factory(),
            'to_user_id' => User::factory(),
            'body' => $this->faker->text(),
            'attachment' => $this->faker->word(),
            'seen' => $this->faker->boolean(),
        ];
    }
}
