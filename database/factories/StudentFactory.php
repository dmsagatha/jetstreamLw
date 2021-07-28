<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
  protected $model = Student::class;
  
  public function definition()
  {
    $lessons  = Lesson::pluck('id')->all();
    $sections = Section::pluck('id')->all();

    return [
      'lesson_id' => $this->faker->randomElement($lessons),
      'section_id' => $this->faker->randomElement($sections),
      'name' => $this->faker->name,
      'email' => $this->faker->unique()->safeEmail,
      'address' => $this->faker->address,
      'phone_number' => $this->faker->phoneNumber,
    ];
  }
}