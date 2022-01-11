<?php

namespace Database\Factories;

use App\Models\Peripheral;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeripheralFactory extends Factory
{
  protected $model = Peripheral::class;
  
  public function definition()
  {
    $users    = User::where('role', '<>', 'admin')->pluck('id')->all();
    $sentence = $this->faker->sentence($nbWords = 3);

    return [
      // 'per_type'    => $this->faker->randomElement(['cpu', 'screen', 'keyboard', 'pointer', 'speakers', 'headphones']),
      'per_type'    => 'screen',
      'inventory'   => $this->faker->unique()->numberBetween($min = 10000000, $max = 90000000),
      'usersabs_id' => $this->faker->randomElement($users),
      'observation' => $sentence,
      'initial_warranty' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
      'final_warranty'   => $this->faker->dateTimeBetween('-2 years', '5 years')->format('Y-m-d'),
    ];
  }
}