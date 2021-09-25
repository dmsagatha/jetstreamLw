<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Post;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Product;
use App\Models\Section;
use App\Models\Student;
use App\Models\Category;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Appointment::query()->delete();
    Product::query()->delete();
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
      'active'   => '1',
      'password' => bcrypt('superadmin'),
    ]);

    User::factory()->times(100)->create();

    // Estudiantes
    $lessons = Lesson::factory()->times(5)->create();
    $lessons->each(function ($lesson) {
      Section::factory()->times(2)->create([
        'lesson_id' => $lesson->id,
      ]);
    });
    Student::factory()->times(30)->create();

    // Productos
    // Category::factory()->times(10)->create();
    $categories = Category::factory()->times(5)->create();
    $categories->each(function ($category) {
      Product::factory()->times(3)->create([
        'category_id' => $category->id,
      ]);
    });

    DB::table('appointments')->insert([
      ['name' => 'Equipo A', 'description' => 'Descripción A'],
      ['name' => 'Equipo B', 'description' => 'Descripción B'],
      ['name' => 'Equipo C', 'description' => 'Descripción C'],
      ['name' => 'Equipo D', 'description' => 'Descripción D'],
      ['name' => 'Equipo E', 'description' => 'Descripción E'],
    ]);
  }
}