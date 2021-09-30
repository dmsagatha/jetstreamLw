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
use Illuminate\Support\Facades\Storage;
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
    Category::query()->delete();
    User::query()->delete();
    Post::query()->delete();

    Storage::deleteDirectory('posts');
    Storage::makeDirectory('posts');

    Post::factory()->times(30)->create();

    User::create([
      'name'     => 'Super Admin',
      'role'     => 'admin',
      'email'    => 'superadmin@admin.net',
      'active'   => '1',
      'password' => bcrypt('superadmin'),
    ]);

    User::factory()->times(20)->create();

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

    /* DB::table('appointments')->insert([
      ['name' => 'Equipo A', 'description' => 'Descripción A', 'date' => '2021-01-26'],
      ['name' => 'Equipo B', 'description' => 'Descripción B', 'date' => '2021-03-26'],
      ['name' => 'Equipo C', 'description' => 'Descripción C', 'date' => '2021-05-26'],
      ['name' => 'Equipo D', 'description' => 'Descripción D', 'date' => '2021-07-26'],
      ['name' => 'Equipo E', 'description' => 'Descripción E', 'date' => '2021-09-26'],
    ]); */
    Appointment::factory()->times(300)->create();
  }
}