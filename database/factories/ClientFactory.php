<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Client::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'date_order' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'cost' => random_int(5, 1500),
            'region' => $this->faker->address(),
        ];
    }
}
