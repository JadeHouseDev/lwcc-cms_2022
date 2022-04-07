<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BranchMaster>
 */
class BranchMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'branch_id' => $this->faker->randomNumber(8) ,
            'name' => $this->faker->name ,
            'location' => $this->faker->city ,
            'phone' => $this->faker->phoneNumber() ,
        ];
    }
}
