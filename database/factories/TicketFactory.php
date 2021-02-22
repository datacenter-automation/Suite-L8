<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id'   => User::factory(),
            'status_id' => TicketStatus::factory(),
            'content'   => $this->faker->paragraphs(3, true),
            'read'      => $this->faker->numberBetween(- 8, 8),
        ];
    }
}
