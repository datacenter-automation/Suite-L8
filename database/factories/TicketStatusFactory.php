<?php

namespace Database\Factories;

use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketStatusFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketStatus::class;

    /**
     * @var array
     */
    protected array $statuses = [
        'Open',
        'Resolved',
        'Closed',
        'Hold',
        'Pending Customer Response',
        'Pending Technician Response',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'  => $this->faker->randomElement($this->statuses),
            'color' => $this->faker->safeHexColor(),
        ];
    }
}
