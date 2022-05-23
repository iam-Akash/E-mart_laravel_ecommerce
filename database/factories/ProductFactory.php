<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->words($nb=1, $asText=true),
            'slug'=> $this->faker->unique()->slug,
            'summary'=> $this->faker->text(50),
            'description'=> $this->faker->text(255),
            'stock'=> $this->faker->numberBetween(2,10),
            'price'=> $this->faker->numberBetween(100,1000),
            'offer_price'=> $this->faker->numberBetween(100,1000),
            'discount'=> $this->faker->numberBetween(0,7)*10,
            'size'=> $this->faker->randomElement(['XS','S','M','L','XL','XXL']),
            'photo' => $this->faker->imageUrl('400', '200'),
            'condition'=> $this->faker->randomElement(['new', 'sale', 'popular', 'winter']),
            'status'=> $this->faker->randomElement(['active','inactive']),
            'brand_id'=> $this->faker->randomElement(Brand::pluck('id')->toArray()),
            'parent_category_id'=> $this->faker->randomElement(Category::where('is_parent', 1)->pluck('id')->toArray()),
            'child_category_id'=> $this->faker->randomElement(Category::where('is_parent', 0)->pluck('id')->toArray()),
            'vendor_id'=> $this->faker->randomElement(User::where('role', 'vendor')->pluck('id')->toArray()),
        ];
    }
}
