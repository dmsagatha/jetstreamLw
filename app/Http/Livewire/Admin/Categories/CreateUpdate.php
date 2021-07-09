<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateUpdate extends Component
{
  // Coders Free - https://www.youtube.com/watch?v=Wcf4pbnt5lI&list=PLZ2ovOgdI-kWqCet33O0WezN14KShkwER&index=7
  public $isModalOpen = false;    //$confirmingCategoryAdd y $open

  public $category, $name, $status;

  protected $rules = [
    'name'   => 'required|string|min:4|unique:categories',
    'status' => 'boolean',
  ];

  public function save()
  {
    $this->validate();

    if (isset($this->category->id)) {
      $this->category->save();
      
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      Category::create([
        'name'   => $this->name,
        'status' => $this->status    // Revisar
      ]);
      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    }

    $this->closeModal();
    $this->emit('triggerRefresh');
    // $this->emitTo('admin.categories.categories', 'render');
  }

  public function render()
  {
    return view('admin.categories.createUpdate');
  }

  public function closeModal()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset();
  }

  /**
   * Mostrar las validaciones mientras se escribe
   */
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}