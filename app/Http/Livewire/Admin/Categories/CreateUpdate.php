<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CreateUpdate extends Component
{
  // Coders Free - https://www.youtube.com/watch?v=Wcf4pbnt5lI&list=PLZ2ovOgdI-kWqCet33O0WezN14KShkwER&index=7
  public $isModalOpen = false;    // $open

  public $category, $categoryId, $name, $status;

  protected $listeners = ['create', 'edit'];

  public function render()
  {
    return view('admin.categories.createUpdate');
  }

  public function rules()
  {
    return [
      'name'   => 'required|string|min:4|unique:categories,name,' . $this->categoryId,
      'status' => 'boolean',
    ];
  }

  public function create()
  {
    $this->category = null; //Para las validaciones

    $this->closeModal();
    $this->isModalOpen = true;
  }

  public function edit(Category $category)
  {
    $this->category   = $category;
    $this->categoryId = $category['id'];
    $this->name       = $category->name;
    $this->status     = $category->status;

    $this->isModalOpen = true;
  }

  public function save()
  {
    $this->validate();

    if (!is_null($this->categoryId)) {
      $this->category->save();
    } else {
      Category::create($this->category);
    }

    /* if (isset($this->category->id)) {
      $this->category->save();
      
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      $this->category->create([
        'name'   => $this->name,
        'status' => $this->status,
      ]);
      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    } */


    // Opción 1 Funciona - REVISAR CAMPO status -> inactive (0)
    /* $validated = $this->validate([
      'name'   => 'required|string|min:4|unique:categories,name,' . $this->categoryId,
      'status' => 'boolean',
    ]);
    if ($this->categoryId) {
      Category::find($this->categoryId)
        ->update([
          'name'   => $this->name,
          'status' => $this->status,
        ]);
    } else {
      Category::create($validated);
    } */

    $this->closeModal();
    $this->emit('triggerRefresh');  // $this->emitTo('admin.categories.categories', 'render');
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










  /**
   * Instancia del modelo Category
   */
  /* public function mount(Category $category)
  {
    $this->category = $category;
  }
  
  protected $rules = [
    'category.name'   => 'required|string|min:4|unique:categories,name',
    'category.status' => 'boolean',
  ]; */
  
  /* public function rules()
  {
    return [
      'category.name'   => 'required|string|min:4|unique:categories,name,' . $this->categoryId,
      'category.status' => 'boolean',
    ];
  } */
}