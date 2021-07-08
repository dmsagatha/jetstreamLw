<?php

use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Categories\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function ()
{
  return view('dashboard');
})->name('dashboard');

// Coders Free - https://codersfree.com/course-status/crea-aplicaciones-web-dinamicas-con-laravel-livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', Posts::class)->name('posts');

Route::group(['middleware' => 'auth:sanctum'], function ()
{
  // lauchoIT - Datatable - https://www.youtube.com/watch?v=vVCk6WLhpls&list=PL6qvAWOEyjhobIhfl37npsBJKRBCKbYfF&index=2
  Route::get('/user/list', [UserController::class, 'list'])->name('user.list');

  // http://www.ascsoftwares.com/technology/laravel-livewire-crud-pagination-using-tailwind-modal/
  Route::get('/categorias', Categories::class)->name('categories');
});