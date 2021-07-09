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

  public $category;
  public $confirmingCategoryAdd = false;    //$open

  protected $listeners = [
    'triggerRefresh' => '$refresh'
  ];

  public function render()
  {
    $categories = Category::where('name', 'like', '%' . $this->search . '%')
                    ->when($this->active, function ($query) {
                      return $query->active();
                    })
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

    return view('admin.categories.index', compact('categories'));
  }

  protected $rules = [
    'category.name'   => 'required|string|min:4',
    'category.status' => 'boolean',
  ];

  public function confirmCategoryEdit(Category $category)
  {
    $this->resetErrorBag();
    $this->category = $category;
    $this->confirmingCategoryAdd = true;
  }

  public function saveCategory()
  {
    $this->validate();

    if (isset($this->category->id)) {
      $this->category->save();
      session()->flash('message', 'Category Saved Successfully');
    } else {
      $this->category->create([
        'name'   => $this->category['name'],
        'status' => $this->category['status'] ?? 0,
      ]);
      session()->flash('message', 'Category Added Successfully');
    }

    $this->confirmingCategoryAdd = false;
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