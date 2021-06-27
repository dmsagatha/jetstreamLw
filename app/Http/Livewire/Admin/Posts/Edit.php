<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\WithFileUploads;
use Storage;
use Livewire\Component;

class Edit extends Component
{
  use WithFileUploads;

  public $isModalOpen = false;  
  public $post, $image, $identifier;

  // Instancia del modelo Post
  public function mount(Post $post)
  {
    $this->post = $post;
    $this->identifier = rand();
  }

  protected $rules = [
    'post.title'   => 'required|min:3|max:100',
    'post.content' => 'required|min:10',
  ];
  
  public function render()
  {
    return view('admin.posts.edit');
  }

  public function save()
  {
    $this->validate();

    if ($this->image) {
      Storage::delete([$this->post->image]);

      $this->post->image = $this->image->store('posts');
    }

    $this->post->save();

    $this->resetInputFields();

    // Emitir un evento para que solo lo escuche el componente Posts
    $this->emitTo('admin.posts.posts', 'render');

    // Mensaje para ser ejecutado por Sweetalert2 - js/app.js
    $this->emit('alertCreate', 'Post actualizado satisfactoriamente.');
  }

  private function resetInputFields()
  {
    $this->reset(['isModalOpen', 'image']);

    $this->identifier = rand();
  }
}