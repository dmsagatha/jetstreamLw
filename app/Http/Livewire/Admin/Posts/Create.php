<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
  // Ventana Modal
  public $isModalOpen = true;

  // Campos
  public $title, $content;

  public function render()
  {
    return view('admin.posts.create');
  }

  public function save()
  {
    Post::create([
      'title'   => $this->title,
      'content' => $this->content,
    ]);
  }
}