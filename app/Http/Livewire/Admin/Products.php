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
  public $sortColumn = 'name';
  public $sortDirection = 'asc';

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

    $products->orderBy($this->sortColumn, $this->sortDirection);

    return view('admin.products.index', [
      'products' => $products->paginate($this->perPage),
    ]);
  }

  public function sortByColumn($column)
  {
    if ($this->sortColumn == $column) {
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    } else {
        $this->reset('sortDirection');
        $this->sortColumn = $column;
    }
  }
}