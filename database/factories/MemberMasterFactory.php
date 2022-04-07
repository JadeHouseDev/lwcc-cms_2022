<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberMaster>
 */
class MemberMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id' => $this->faker->randomNumber(8),
            'member_other_names' => $this->faker->firstName,
            'member_surname' => $this->faker->lastName
        ];
    }
}
