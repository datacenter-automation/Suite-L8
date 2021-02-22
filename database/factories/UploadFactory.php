<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Upload;
use App\Models\User;

class UploadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upload::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'filename_uniqid' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'filename' => $this->faker->word(),
            'file_attibutes' => '{}',
            'encrypted_at' => $this->faker->dateTime(),
            'uploader_ip_address' => $this->faker->ipv4(),
        ];
    }
}
