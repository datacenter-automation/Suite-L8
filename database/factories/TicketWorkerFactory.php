<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketWorker;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketWorkerFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketWorker::class;

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
        ];
    }
}
