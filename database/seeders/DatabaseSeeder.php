<?php

namespace Database\Seeders;

use Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Student::query()->delete();
    Section::query()->delete();
    Lesson::query()->delete();
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

    $lessons = Lesson::factory()->times(5)->create();
    $lessons->each(function ($lesson) {
      Section::factory()->times(2)->create([
        'lesson_id' => $lesson->id,
      ]);
    });
    Student::factory()->times(30)->create();
  }
}