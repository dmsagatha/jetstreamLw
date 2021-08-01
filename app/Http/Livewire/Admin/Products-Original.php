<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = false;

  public $categories = [];

  public function mount()
  {
    $this->categories = Category::pluck('name', 'id');
  }
  // with('categories')
  public function render()
  {
    if ($this->search != "")
    {
      return view('admin.products.index', [
        'products' => Product::search($this->search)
        /* where('name', 'like', '%' . $this->search . '%')
        ->orWhere('price', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->orWhereHas('category', function($query) {
        $query->where('category', 'like', '%' . $this->search . '%');
        }) */
          ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
          ->paginate($this->perPage),
      ]);
    }
    else
    {
      /* return view('admin.products.index', [
      'products' => Product::with('category')
      ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
      ->paginate($this->perPage)
      ]); */

      return view('admin.products.index', [
        'products' => Product::leftJoin('categories', 'products.id', '=', 'products.category_id')
          ->select(
            'products.id',
            'products.name',
            'price',
            'description',
            'categories.name as category_name',
            'category_id',
          )
          ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
          ->paginate($this->perPage),
      ]);
    }

    /* return view('admin.products.index', [
  'products' => Product::search($this->search)
  ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
  ->select(
  'products.id',
  'products.name',
  'price',
  'description',
  'categories.name as category_name',
  'category_id',
  )
  ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
  ->paginate($this->perPage)
  ]); */
  }
  /* public function render()
  {
  return view('admin.products.index', [
  'products' => Product::search($this->search)
  ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
  ->select(
  'products.id',
  'products.name',
  'price',
  'description',
  'categories.name as category_name',
  'category_id',
  )
  ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
  ->paginate($this->perPage)
  ]);
  } */

  /**
   * Si el campo esta activo (ordenado), reversar el ordenamiento,
   * de lo contrario configurar la dirección a 'true'
   */
  public function sortBy($field)
  {
    if ($this->sortField === $field)
    {
      $this->sortAsc = !$this->sortAsc;
    }
    else
    {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function clearPage()
  {
    $this->reset();
  }
}