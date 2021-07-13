<?php

use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Tags;
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
  Route::get('/user/list', [UserController::class, 'list'])->name('user.list');

  // http://www.ascsoftwares.com/technology/laravel-livewire-crud-pagination-using-tailwind-modal/
  Route::get('/categorias', Categories::class)->name('categories');

  // Sin Modal
  // Laraveller - Laravel Livewire Tutorial #5 Create Read Delete Data on Database - https://www.youtube.com/watch?v=VlT48yRlIN4&list=PL6tf8fRbavl2LBvhQnxLBdNANEJTwA5an&index=5
  Route::get('/etiquetas', Tags::class)->name('tags');
});