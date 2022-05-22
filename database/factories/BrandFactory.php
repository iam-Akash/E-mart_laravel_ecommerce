<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=$this->faker->word;
        $slug=Str::slug($title);
        return [
            'title'=>$title,
            'slug'=>$slug,
            'photo'=>$this->faker->imageUrl('60','60'),
            'status'=> $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
