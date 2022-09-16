<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->sentence(3),
            'descripcion'=>$this->faker->sentence(15),
            'imagen'=>$this->faker->uuid() . '.jpg',
            'user_id'=>$this->faker->randomElement([1]),
        ];
    }
}
