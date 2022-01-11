<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  protected $model = Post::class;

  public function definition()
  {
    return [
      'title'   => $this->faker->unique()->sentence(),
      'content' => $this->faker->text(),
      // 'image'   => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false),  // posts/image1
    ];
  }
}