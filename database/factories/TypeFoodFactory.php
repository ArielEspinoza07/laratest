<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeFoodFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => $this->faker->randomElement(['asiatica', 'italiana', 'mexicana']),
            'created_by' => User::query()
                                ->select('id')
                                ->inRandomOrder()
                                ->value('id'),
            'created_at' => now(),
        ];
    }
}
