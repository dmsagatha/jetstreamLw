<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
  protected $model = Appointment::class;
  
  public function definition()
  {
    $name = $this->faker->unique()->sentence();

    return [
      'name'   => $name,
      'status' => $this->faker->randomElement(['Scheduled', 'Closed']),
      'date'   => $this->faker->dateTimeBetween('-1 years', '5 years')->format('Y-m-d'),
      'description' => $this->faker->text(50),
      'user_id' => User::all()->random()->id
    ];
  }
}