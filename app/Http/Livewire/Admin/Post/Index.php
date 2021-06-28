<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
  use WithPagination;


  public function render()
  {
    return view('admin.post.index', [
      'posts' => Post::all()->paginate(5)
    ]);
  }
}