<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'username' => $this->faker->username(),
            'email' =>$this->faker->email(),
            'bio'=> $this->faker->text(),
            'job' => $this->faker->jobTitle()

        ];
    }
}
