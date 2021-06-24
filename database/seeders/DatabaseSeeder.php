<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    User::query()->delete();
    Post::query()->delete();

    Post::factory()->times(100)->create();

    User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@admin.net',
      'password' => bcrypt('superadmin'),
    ]);
  }
}