<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Minitry>
 */
class MinistryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ministry_id' => $this->faker->randomNumber(8) ,
            'name' => $this->faker->firstName('male') . " Ministry" ,
            'alias' => $this->faker->userName() ,
            'type' => $this->faker->name() ,
        ];
    }
}
