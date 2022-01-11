<?php

namespace App\Http\Controllers\Admin;

use App\Models\Screen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScreenController extends Controller
{
  public function index()
  {
    return view('admin.screens.index');
  }

  public function edit(Screen $screen): Screen 
  {
    return $screen;
  }
}