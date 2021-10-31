<?php

namespace App\Http\Livewire\Admin;

use App\Models\People;
use Livewire\WithPagination;
use Livewire\Component;

class PeopleList extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '10';
  public $sortField = 'id';
  public $sortAsc   = true;
  public $readyToLoad = false;

  protected $listeners = [
    'deleteConfirmed' => 'deleteRegister',
  ];

  public $idBeingRemoved = null;

  public function render()
  {
    return view('admin.peoples.index', [
      'peoples' => People::where('name', 'like', '%' . $this->search . '%')
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage),
    ]);
  }

  public function confirmRemoval($peopleId)
  {
    $this->idBeingRemoved = $peopleId;

    $this->dispatchBrowserEvent('show-delete-confirmation');
  }

  public function deleteRegister()
  {
    $people = People::findOrFail($this->idBeingRemoved);

    $people->delete();

    $this->dispatchBrowserEvent('deleted', ['message' => 'Registro eliminado satisfactoriamente!']);
  }
  
  public function loadRecords()
  {
    $this->readyToLoad = true;
  }

  public function clearPage()
  {
    $this->resetPage();
    $this->reset();
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