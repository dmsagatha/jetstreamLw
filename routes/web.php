<?php

use App\Http\Livewire\Admin\Tags;
use App\Http\Livewire\Admin\Products;
use App\Http\Livewire\Admin\Students;
use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Books\Books;
use App\Http\Livewire\Admin\Books\CreateUpdate;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function ()
{
  return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/posts', Posts::class)->name('posts');

Route::group(['middleware' => 'auth:sanctum'], function ()
{
  // Coders Free - https://codersfree.com/course-status/crea-aplicaciones-web-dinamicas-con-laravel-livewire
  Route::get('/posts', Posts::class)->name('posts');

  // lauchoIT - Datatable - https://www.youtube.com/watch?v=vVCk6WLhpls&list=PL6qvAWOEyjhobIhfl37npsBJKRBCKbYfF&index=2
  Route::get('/usuarios/listado', [UserController::class, 'list'])->name('user.list');

  // http://www.ascsoftwares.com/technology/laravel-livewire-crud-pagination-using-tailwind-modal/
  Route::get('/categorias', Categories::class)->name('categories');

  // Sin Modal 
  // toniel/crud-livewire - https://github.com/toniel/crud-livewire
  // Laraveller - Laravel Livewire Tutorial #5 Create Read Delete Data on Database - https://www.youtube.com/watch?v=VlT48yRlIN4&list=PL6tf8fRbavl2LBvhQnxLBdNANEJTwA5an&index=5
  Route::get('/etiquetas', Tags::class)->name('tags');

  // Tapan Sharma - Datatables Using Laravel and Livewire
  // Filtros y buscadores entre varias tablas
  // https://www.youtube.com/watch?v=3EpOGcKOXK0&list=PLBCuZqyXqWkxqz4BGJV4x_T4Xqu1dF8jX&index=1
  Route::get('/estudiantes', Students::class)->name('students');

  // Daily Laravel | Kit Livewire
  Route::get('/productos', Products::class)->name('products');
  
  Route::get('/libros', Books::class)->name('books.index');
  Route::get('/libros/crear', CreateUpdate::class)->name('books.create');
  Route::view('/libros/editar/{bookId}', 'admin.books.edit')->name('books.edit');
});