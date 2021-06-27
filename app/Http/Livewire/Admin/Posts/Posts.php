<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;

class Posts extends Component
{
  use WithPagination, WithFileUploads;

  public $isModalEdit = false;

  public $search    = '';
  public $sortField = 'id';
  public $sortAsc   = 'desc';
  public $perPage   = '5';
  public $readyToLoad = false;

  // Coders Free - 11 - Pasar parámetros de acción public function edit()
  public $post, $image, $identifier;

  public function mount(Post $post)
  {
    $this->identifier = rand();

    // Trying to get property 'image' of non-object
    $this->post = new Post();
  }

  protected $rules = [
    'post.title'   => 'required|min:3|max:100',
    'post.content' => 'required|min:10',
  ];

  // Cuando escuche el evento 'render' ejecute el método render()
  public $listeners = ['render'];

  // Página por la Url
  protected $queryString = [
    'search'    => ['except' => ''],
    'perPage'   => ['except' => '5'],
    'sortField' => ['except' => 'id'],
    'sortAsc'   => ['except' => 'desc']
  ];

  public function render()
  {
    if ($this->readyToLoad) {
      $posts = Post::where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%')
                  ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                  ->paginate($this->perPage);
    } else {
      $posts = [];
    }    

    return view('admin.posts.posts', compact('posts'));
  }

  /**
   * Este método se ejecuta cuando la carga de la página se haya completado
   * Vista <div wire:init="loadRecords">
   */
  public function loadRecords()
  {
    $this->readyToLoad = true;
  }

  public function clearSearch()
  {
    $this->search  = '';
    $this->perPage = '10';
  }

  /**
   * Ejecutar solo cuando se cambie el valor de $search
   */
  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function sortBy($field)
  {
    /* Si el campo esta activo, reversar el ordenamiento,
    de lo contrario configurar la dirección a 'true' */
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function edit(Post $post)
  {
    $this->post = $post;
    $this-> isModalEdit = true;
  }

  public function update()
  {
    $this->validate();

    if ($this->image) {
      Storage::delete([$this->post->image]);

      $this->post->image = $this->image->store('posts');
    }

    $this->post->save();

    $this->resetInputFields();

    // Mensaje para ser ejecutado por Sweetalert2 - js/app.js
    $this->emit('alertCreate', 'Post actualizado satisfactoriamente.');
  }

  private function resetInputFields()
  {
    $this->reset(['isModalEdit', 'image']);

    $this->identifier = rand();
  }
}