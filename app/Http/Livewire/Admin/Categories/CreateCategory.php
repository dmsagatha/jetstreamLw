<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
  public $isModalOpen = false;
  public $name, $description, $identificator;

  protected $rules = [
    'name'        => 'required|string|min:6|unique:categories',
    'description' => 'required|string|max:100',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function render()
  {
    return view('admin.categories.create-category');
  }

  public function mount()
  {
    $this->identificator = rand();
  }

  public function save()
  {
    $this->validate();

    Category::create([
      'name'        => $this->name,
      'description' => $this->description,
    ]);

    $this->reset(['isModalOpen', 'name', 'description']);

    $this->identificator = rand();
    
    $this->emitTo('categories', 'render');
    $this->emit('alert', 'La Categoría creada satisfactoriamente');
  }
}