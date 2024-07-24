<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'user_id' => User::factory(),
            'detail_id'=>Detail::factory(),
            'title' => $this->faker->jobTitle(),
            'photo' => $this->faker->imageUrl(),
            'slug' =>$this->faker->slug(),
            'color' =>$this->faker->colorName(),
            'price' =>$this->faker->randomNumber(),
            'body' =>$this->faker->paragraph(),
        ];
    }
}
