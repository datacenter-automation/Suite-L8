<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketLogFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ticket_id' => Ticket::factory(),
            'user_id'   => User::factory(),
            'content'   => $this->faker->paragraphs(3, true),
        ];
    }
}
