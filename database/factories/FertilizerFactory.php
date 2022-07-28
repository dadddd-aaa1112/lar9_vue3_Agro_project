<?php

namespace Database\Factories;

use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fertilizer>
 */
class FertilizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Fertilizer::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'norm_azot' => random_int(1, 1000),
            'norm_fosfor' => random_int(1, 2000),
            'norm_kalii' => random_int(2, 200),
            'culture_id' => Culture::get()->random()->id,
            'raion' => $this->faker->address,
            'cost' => random_int(5, 500),
            'description' => $this->faker->paragraph(5),
            'target' => $this->faker->paragraph(4)
        ];
    }
}
