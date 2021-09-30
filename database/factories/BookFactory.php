<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
  protected $model = Book::class;
  
  public function definition()
  {
    return [
      'name'  => $this->faker->unique()->word,
      'author'=> $this->faker->firstName(),
      'pages' => $this->faker->numberBetween(50, 300),
    ];
  }
}