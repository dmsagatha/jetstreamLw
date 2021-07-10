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

  public function create()
  {
    $this->category = null; //Para las validaciones

    // Textos dinámicos para los títulos y botones
    /* $this->action = 'Crear';
    $this->method = 'save()'; */

    $this->closeModal();
    $this->isModalOpen = true;
  }

  public function edit(Category $category)
  {
    $this->category   = $category;
    $this->categoryId = $category['id'];
    $this->name       = $category->name;
    $this->status     = $category->status;

    // Textos dinámicos para los títulos y botones
    /* $this->action = 'Actualizar';
    $this->method = 'save()'; */

    $this->isModalOpen = true;
  }

  public function save()
  {
    /* $this->validate();

    if (isset($this->category->id)) {
      $this->category->save();
      
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      $this->category->create([
        'name'   => $this->category['name'],
        'status' => $this->category['status'] ?? 0,
      ]);
      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    } */

    $validated = $this->validate([
      'name'   => 'required|string|min:4|unique:categories,name,' . $this->categoryId,
      'status' => 'boolean',
    ]);
    /* $this->validate([
      'category.name'   => 'required|string|min:4|unique:categories,name,' . $this->categoryId,
      'category.status' => 'boolean',
    ]); */
    if ($this->categoryId) {
      Category::find($this->categoryId)
        ->update([
          /* 'name'   => $this->name,
          'status' => $this->status, */
          'name'   => $this->category['name'],
          'status' => $this->category['status'] ?? 0,
        ]);
    } else {
      Category::create($validated);
    }

    /* if (isset($this->category->id)) {
      $this->category->save();
      
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      $this->category->create([
        'name'   => $this->category['name'],
        'status' => $this->category['status'] ?? 0,
        /* 'name'   => $this->name,
        'status' => $this->status,
      ]); */
      // $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
    // } */

    $this->closeModal();
    $this->emit('triggerRefresh');
    // $this->emitTo('admin.categories.categories', 'render');
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
  /* public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  } */










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