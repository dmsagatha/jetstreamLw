<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class Appointments extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = true;

  public function render()
  {
    return view('admin.appointments.index', [
      'appointments' => Appointment::search(trim($this->search))
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage)
    ]);
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