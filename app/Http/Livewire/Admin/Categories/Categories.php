<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;

class Categories extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = false;
  public $active;

  public function render()
  {
    $categories = Category::where('name', 'like', '%' . $this->search . '%')
                ->when($this->active, function( $query) {
                    return $query->active();
                })
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);

    return view('admin.categories.index', compact('categories'));
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

  public function clearSearch()
  {
    $this->reset();
  }
}