<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = rand(500, 1500);
        $new_price = $price - rand(50, 300);

        $categories_id = Category::pluck('id')->toArray();
        
        return [
            'title' => $this->faker->word,
            'price' => $price,
            'new_price' => rand(0,1)? $new_price: null,
            'alias' => $this->faker->unique()->word,
            'is_stoke' => rand(0,1),
            'description' => $this->faker->text,
            'category_id' => $categories_id[array_rand($categories_id)]
        ];
    }
}
