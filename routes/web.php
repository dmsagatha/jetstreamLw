<?php

use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Coders Free - https://codersfree.com/course-status/crea-aplicaciones-web-dinamicas-con-laravel-livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', Posts::class)->name('posts');

// lauchoIT - Datatable - https://www.youtube.com/watch?v=vVCk6WLhpls&list=PL6qvAWOEyjhobIhfl37npsBJKRBCKbYfF&index=2
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
});
