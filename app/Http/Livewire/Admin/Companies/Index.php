<?php

namespace App\Http\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;
use Livewire\Component;

class Index extends Component
{
  use WithPagination;
  use WithSorting;

  public $search    = '';
  // public $perPage   = '25';
  public $sortField = 'id';
  public $sortAsc   = true;
  public $readyToLoad = false;

  public int $perPage;
  public array $paginationOptions;

  protected $listeners = [
    'deleteConfirmed' => 'deleteRegister',
  ];

  public $idBeingRemoved = null;

  public function render()
  {
    return view('admin.companies.index', [
      'companies' => Company::search(trim($this->search))
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage),
    ]);
  }

  public function mount()
  {
    /* $this->sortBy            = 'id';
    $this->sortDirection     = 'desc'; */
    $this->perPage           = 25;
    $this->paginationOptions = config('project.pagination.options');
    // $this->orderable         = (new ContactCompany())->orderable;
  }

  public function confirmRemoval($companiesId)
  {
    $this->idBeingRemoved = $companiesId;

    $this->dispatchBrowserEvent('show-delete-confirmation');
  }

  public function deleteRegister()
  {
    $companies = Company::findOrFail($this->idBeingRemoved);

    $companies->delete();

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