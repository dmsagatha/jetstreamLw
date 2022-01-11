<?php

namespace Database\Factories;

use App\Models\Screen;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScreenFactory extends Factory
{
  protected $model = Screen::class;
  
  public function definition()
  {
    $brands = Brand::pluck('id')->all();

    return [
      'serial'     => $this->faker->unique()->numberBetween($min = 1000000000, $max = 2000000000),
      'size'       => $this->faker->randomElement(['27', '25', '21', '19', '17', '15', '14']),
      "active"     => rand(0, 1),
      'brand_id'   => $this->faker->randomElement($brands),
      "created_at" => now()->subDays(rand(20, 100)),
    ];
  }
}