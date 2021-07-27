<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
  protected $model = Section::class;
  
  public function definition()
  {
    return [
      'lesson_id' => Lesson::factory(),
      'name' => $this->faker->unique()->word,
    ];
  }
}