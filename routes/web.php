<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Posts\Posts;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Coders Free - https://codersfree.com/course-status/crea-aplicaciones-web-dinamicas-con-laravel-livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', Posts::class)->name('posts');