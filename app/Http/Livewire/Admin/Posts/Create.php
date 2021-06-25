<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
  // Ventana Modal
  public $isModalOpen = false;

  // Campos
  public $title, $content;

  protected $rules = [
    'title'   => 'required|min:3|max:100|unique:posts',
    'content' => 'required|min:10',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function render()
  {
    return view('admin.posts.create');
  }

  public function save()
  {
    $this->validate();

    Post::create([
      'title'   => $this->title,
      'content' => $this->content,
    ]);

    $this->resetInputFields();

    // Emitir un evento para que lo escuche el componente Posts
    // $this->emit('render');

    // Emitir un evento para que solo lo escuche el componente Posts
    $this->emitTo('admin.posts.posts', 'render');

    // Mensaje para ser ejecutado por Sweetalert2 - js/app.js
    $this->emit('alertCreate', 'Post creado satisfactoriamente.');
  }

  private function resetInputFields()
  {
    $this->reset(['isModalOpen', 'title', 'content']);
  }
}