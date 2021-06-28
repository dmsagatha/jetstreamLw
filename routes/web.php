<?php

use App\Http\Livewire\Admin\Posts\Posts;
use App\Http\Livewire\Admin\Post\Postjt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Coders Free - https://codersfree.com/course-status/crea-aplicaciones-web-dinamicas-con-laravel-livewire
Route::middleware(['auth:sanctum', 'verified'])->get('/posts', Posts::class)->name('posts');

// Jack of Traits - https://www.youtube.com/watch?v=4muQp-nB0ZQ&list=PLSP81gW0XjNFP8RTBLMb1KL7Qbr8hUjr4&index=1
Route::middleware(['auth:sanctum', 'verified'])->get('/post', Postjt::class)->name('post');