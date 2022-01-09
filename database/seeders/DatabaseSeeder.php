<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Brand;
use App\Models\Lesson;
use App\Models\People;
use App\Models\Screen;
use App\Models\Product;
use App\Models\Section;
use App\Models\Student;
use App\Models\Category;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Screen::query()->delete();
    Brand::query()->delete();
    People::query()->delete();
    Book::query()->delete();
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
    
    Appointment::factory()->times(300)->create();

    Book::factory(20)->create();

    DB::table('people')->insert([
      ['name' => 'Persona A', 'active' => '1'],
      ['name' => 'Persona B', 'active' => '0'],
      ['name' => 'Persona C', 'active' => '1'],
      ['name' => 'Persona D', 'active' => '0'],
      ['name' => 'Persona E', 'active' => '1'],
    ]);

    DB::table('brands')->insert([
      ['name' => 'Dell',              'slug' => 'Dell'],
      ['name' => 'Hewlett Packard',   'slug' => 'HP'],
      ['name' => 'Apple Inc',         'slug' => 'Mac'],
      ['name' => 'Lenovo Group Ltd',  'slug' => 'Lenovo'],
    ]);

    Screen::factory()->times(15)->create();
  }
}