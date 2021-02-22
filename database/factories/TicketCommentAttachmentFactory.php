<?php

namespace Database\Factories;

use App\Models\TicketComment;
use App\Models\TicketCommentAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketCommentAttachmentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketCommentAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ticket_comment_id' => TicketComment::factory(),
            'file_name'         => $this->faker->regexify('[A-Za-z0-9]{70}'),
        ];
    }
}
