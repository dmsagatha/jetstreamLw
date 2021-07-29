<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;

class Products extends Component
{
  use WithPagination;

  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = false;

  public $categories = [];

  public function mount()
  {
    $this->categories = Category::pluck('name', 'id');
  }

  public function render()
  {
    $products = Product::select([
      'products.id',
      'products.name', 
      'price',
      'description',
      'categories.name as category_name',
      'category_id',
    ])
      ->leftJoin('categories',
        'products.category_id', '=', 'categories.id');

    /* foreach ($this->searchColumns as $column => $value)
    {
      if (!empty($value))
      {
        if ($column == 'price') {
          if (is_numeric($value[0])) {
            $products->where($column, '>', $value[0]);
          }
          if (is_numeric($value[1])) {
            $products->where($column, '<', $value[1]);
          }
        }
        else if ($column == 'category_id') {
          $products->where($column, $value);
        }
        else {
          $products->where('products.' . $column, 'LIKE', '%' . $value . '%');
        }
      }
    } */

    $products->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

    return view('admin.products.index', [
      'products' => $products->paginate($this->perPage),
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
}