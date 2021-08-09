<?php

namespace Database\Factories;

use App\Models\Characteristic;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacteristicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Characteristic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_id = Product::pluck('id')->toArray();

        return [
            'product_id' => $product_id[array_rand($product_id)],
            'name' => $this->faker->word,
            'value' => $this->faker->word
        ];
    }
}
