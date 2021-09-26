<?php

namespace App\Http\Livewire\Admin\Appointments;

use Carbon\Carbon;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $date;

  public function render()
  {
    return view('admin.appointments.createUpdate');
  }
}