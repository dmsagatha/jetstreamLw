<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\WithPagination;
use Livewire\Component;

class Tags extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = false;

  public $tagId, $name;

  protected $listeners = [
    'deleteRegisterList' => 'deleteRegister'
  ];

  public function rules()
  {
    return [
      'name' => 'required|string|min:4|unique:tags,name,' . $this->tagId
    ];
  }
  
  public function render()
  {
    $tags = Tag::where('name', 'like', '%' . $this->search . '%')
              ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
              ->paginate($this->perPage);
    
    return view('admin.tags.tags-crud', compact('tags'));
  }

  public function store()
  {
    $this->validate();

    Tag::create([
      'name' => $this->name,
    ]);

    $this->clearPage();
  }

  public function deleteRegister(Tag $tag)
  {
    $tag->delete();

    $this->emit('deleteRegister', $tag);
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function clearPage()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset();
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
}