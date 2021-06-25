<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
  use WithPagination;

  public $search    = '';
  public $sortField = 'id';
  public $sortAsc   = false;
  public $perPage   = '10';

  public function render()
  {
    $posts = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);

    return view('admin.posts.posts', compact('posts'));
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
}