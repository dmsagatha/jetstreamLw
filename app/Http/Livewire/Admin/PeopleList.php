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

  // Lista y Formulario
  public $typeForm = 'list';
  public $people, $peopleId, $name;
  public $active   = false;

  protected $listeners = [
    'deleteConfirmed' => 'deleteRegister',
  ];

  public $idBeingRemoved = null;

  public function render()
  {
    /* if ($this->typeForm === 'crud') {
      return view('admin.peoples.index');
    } */

    $peoples = People::where('name', 'like', '%' . $this->search . '%')
        ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
        ->paginate($this->perPage);
    
    return view('admin.peoples.index', compact('peoples'));
  }

  public function rules()
  {
    return [
      'name' => 'required|string|min:3|unique:people,name,' . $this->peopleId,
    ];
  }

  public function create()
  {
    $this->typeForm = 'crud';
    $this->clear();
  }

  public function edit($id)
  {
    $this->clear();
    $model = People::find($id);
    $this->peopleId = $model->id;
    $this->name = $model->name;
    $this->active = $model->active;
    $this->typeForm = 'crud';
  }

  public function clear()
  {
    $this->peopleId = null;
    $this->name     = '';
    $this->active   = false;
  }

  public function cancel()
  {
    $this->clear();
    $this->typeForm = "list";
  }

  public function save()
  {
    $this->validate();

    $data = [
        'name'   => $this->name,
        'active' => $this->active
    ];

    if ($this->peopleId) {
        $people = People::find($this->peopleId);
        $people->fill($data);
        $people->save();

        $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');

        return redirect()->route('peoples.index');
    } else {
        $people = People::create($data);

        $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

        //$this->edit($people->id);
        return redirect()->to('/personas');
    }
  }

  public function changeActive($id)
  {
    if ($model = People::find($id)) {
      $model->active = !$model->active;
      $model->save();
    }
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

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  protected function updatingFilter()
  {
    $this->resetPage();
  }
  
  public function loadRecords()
  {
    $this->readyToLoad = true;
  }
}