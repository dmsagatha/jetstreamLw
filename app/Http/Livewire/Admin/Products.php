<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Products extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = false;

  public $byCategory = null;

  public $categories = [];

  /* public function mount()
  {
    $this->categories = Category::pluck('name', 'id');
  } */

  public function render()
  {
    return view('admin.products.index', [
      'products' => Product::search($this->search)
          ->when($this->byCategory, function($query) {
                $query->where('category_id', $this->byCategory);
            })
          ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
          ->select(
              'products.id',
              'products.name',
              'products.price',
              'products.description',
              'categories.name AS category_name'
            )
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage),
    ]);
  }

  /**
   * Si el campo esta activo (ordenado), reversar el ordenamiento,
   * de lo contrario configurar la dirección a 'true'
   */
  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function clearPage()
  {
    $this->reset();
  }
}