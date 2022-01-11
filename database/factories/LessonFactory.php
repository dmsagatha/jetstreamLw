<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
  protected $model = Lesson::class;
  
  public function definition()
  {
    return [
      'name' => $this->faker->unique()->word,
    ];
  }
}