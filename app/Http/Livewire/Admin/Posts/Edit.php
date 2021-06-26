<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
  public $isModalOpen = false;  
  public $post;

  // Instancia del modelo Post
  public function mount(Post $post)
  {
    $this->post = $post;
  }

  protected $rules = [
    'post.title'   => 'required|min:3|max:100',
    'post.content' => 'required|min:10',
    // 'post.image'   => 'required|image|max:2048',
  ];
  
  public function render()
  {
    return view('admin.posts.edit');
  }

  public function save()
  {
    $this->validate();

    $this->post->save();

    $this->resetInputFields();

    // Emitir un evento para que solo lo escuche el componente Posts
    $this->emitTo('admin.posts.posts', 'render');

    // Mensaje para ser ejecutado por Sweetalert2 - js/app.js
    $this->emit('alertCreate', 'Post actualizado satisfactoriamente.');
  }

  private function resetInputFields()
  {
    $this->reset(['isModalOpen']);
  }
}