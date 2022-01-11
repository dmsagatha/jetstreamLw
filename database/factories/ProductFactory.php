<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
  protected $model = Product::class;
  
  public function definition()
  {
    return [
      'category_id' => Category::factory(),
      'name' => $this->faker->unique()->word,
      'description' => $this->faker->sentence(),
      'price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 2),
    ];
  }
}