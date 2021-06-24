<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;

class Categories extends Component
{
  use WithPagination;

  public $search      = '';
  public $sort        = 'id';
  public $direction   = 'desc';
  public $amount      = '5';
  public $readyToLoad = false;

  public $identificator;

  protected $listeners = ['render'];

  public function mount()
  {
    $this->identificator = rand();
    $this->category = new Category();
  }

  public function render()
  {
    //Los porcentajes sirven para hacer busquedas por cada palabra en la BD
    if ($this->readyToLoad == true)
    {
      $categories = Category::where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orderBy($this->sort, $this->direction)
                      ->paginate($this->amount);
    } else {
      $categories = [];
    }

    return view('admin.categories.categories', [
      'categories' => $categories
    ]);
  }

  public function loadRecord()
  {
    $this->readyToLoad = true;
  }

  public function order($sort = '')
  {
    $this->sort = $sort;
    
    if ($sort) {
      if ($this->sort == $sort) {
        $this->direction = $this->direction == 'desc' ? 'asc' : 'desc';
      }else{
        $this->direction == 'asc';
      }
    }
  }

  public function updatingSearch()
  {
    $this->resetPage();
  }
}