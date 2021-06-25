<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
// use Illuminate\Support\Facades\Storage;
use Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Storage::deleteDirectory('posts');
    User::query()->delete();
    Post::query()->delete();

    Storage::makeDirectory('posts');

    Post::factory()->times(30)->create();

    User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@admin.net',
      'password' => bcrypt('superadmin'),
    ]);
  }
}