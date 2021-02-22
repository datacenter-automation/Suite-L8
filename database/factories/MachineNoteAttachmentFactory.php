<?php

namespace Database\Factories;

use App\Models\MachineNote;
use App\Models\MachineNoteAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineNoteAttachmentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MachineNoteAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'machine_note_id' => MachineNote::factory(),
            'file_name'       => $this->faker->regexify('[A-Za-z0-9]{70}'),
        ];
    }
}
