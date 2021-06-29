<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\WithPagination;
use Livewire\Component;

class Postjt extends Component
{
  use WithPagination;

  public $search    = '';
  public $sortField = 'id';
  public $sortAsc   = 'desc';
  public $perPage   = '5';
  public $readyToLoad = false;

  /* public $prompt;
  protected $listeners = ['refreshParent'];
  public function refreshParent()
  {
    $this->prompt = "El padre ha sido refrescado.";
  } */
  
  protected $listeners = [
    'refreshParent' => '$refresh',
    'render'
  ];

  public function render()
  {
    $posts = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                ->paginate($this->perPage);

    return view('admin.post.post', compact('posts'));
  }

  public function delete($itemId)
  {
    Post::destroy($itemId);
  }

  public function loadRecords()
  {
    $this->readyToLoad = true;
  }

  public function clearSearch()
  {
    $this->search  = '';
    $this->perPage = '10';
  }
  
  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }
}