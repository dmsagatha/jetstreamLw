<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\WithPagination;
use Livewire\Component;

class Appointments extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = true;

  protected $listeners = [
    'deleteConfirmed' => 'deleteRegister',
  ];

  public $idBeingRemoved = null;

  public function render()
  {
    return view('admin.appointments.index', [
      'appointments' => Appointment::search(trim($this->search))
          ->with('user')
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage)
    ]);
  }
  
  public function confirmRemoval($appointmentId)
  {
    $this->idBeingRemoved = $appointmentId;

    $this->dispatchBrowserEvent('show-delete-confirmation');
  }

  public function deleteRegister()
  {
    $appointment = Appointment::findOrFail($this->idBeingRemoved);

    $appointment->delete();

    $this->dispatchBrowserEvent('deleted', ['message' => 'Registro eliminado satisfactoriamente!']);
  }

  public function clearPage()
  {
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