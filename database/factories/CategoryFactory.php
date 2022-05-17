<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=$this->faker->unique()->words($nb=3, $asText=true);
        $slug=Str::slug($title);
        return [
            'title'=>$title,
            'slug'=>$slug,
            'summary'=>$this->faker->text(100),
            'photo'=>$this->faker->imageUrl(100,100),
            'is_parent'=>$this->faker->randomElement([true,false]),
            'status'=>$this->faker->randomElement(['active', 'inactive']),
            'parent_id'=>$this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}
