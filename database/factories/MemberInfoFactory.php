<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberInfo>
 */
class MemberInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'member_id' => $this->faker->randomNumber(8) ,
            'dob' => $this->faker->date ,
            'residential_address' => $this->faker->streetAddress ,
            'occupation' => $this->faker->jobTitle ,
            'comment' => $this->faker->text(30) ,
        ];
    }
}
