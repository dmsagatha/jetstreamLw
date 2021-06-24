<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
  public $search      = '';

  public function render()
  {
    $posts = Post::where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->get();

    return view('admin.posts.posts', compact('posts'));
  }

  public function clearSearch()
  {
    $this->search  = '';
    // $this->perPage = '10';
  }
}