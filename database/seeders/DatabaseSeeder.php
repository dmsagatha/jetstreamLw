<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Storage::deleteDirectory('posts');
    Category::query()->delete();
    User::query()->delete();
    Post::query()->delete();

    Storage::makeDirectory('posts');

    Post::factory()->times(30)->create();

    User::create([
      'name'     => 'Super Admin',
      'role'     => 'admin',
      'email'    => 'superadmin@admin.net',
      'password' => bcrypt('superadmin'),
    ]);

    User::factory()->times(100)->create();

    Category::factory()->times(10)->create();
  }
}