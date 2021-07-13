<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\Component;

class Tags extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '10';
  public $sortField = 'id';
  public $sortAsc   = false;

  public $tag, $tagId, $name;
  public $saveMethod = 'save';

  protected $listeners = [
    'deleteRegisterList' => 'deleteRegister',
  ];

  public function rules()
  {
    return [
      'name' => [
        'required', 'string', 'min:4',
        Rule::unique('tags')->ignore($this->tagId)],
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

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    $this->clearPage();
  }

  public function edit($tagId)
  {
    $tag = Tag::findOrFail($tagId);
    $this->tagId = $tag->id;
    $this->name  = $tag->name;

    $this->saveMethod = 'update';
  }

  public function update()
  {
    Tag::findOrFail($this->tagId)->update([
      'name' => $this->name,
    ]);

    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    
    $this->clearPage();
  }

  public function deleteRegister(Tag $tag)
  {
    $tag->delete();

    $this->emit('deleteRegister', $tag);
  }

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validatio
    $this->validateOnly($propertyName);
  }

  public function clearPage()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset();

    $this->saveMethod = 'save';
  }
  
  public function updatingSearch()
  {
    $this->resetPage();
  }

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