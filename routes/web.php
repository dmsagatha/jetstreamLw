<?php

use App\Http\Livewire\Admin\Categories\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('categorias', Categories::class)->name('categories')->middleware(['auth:sanctum', 'verified']);