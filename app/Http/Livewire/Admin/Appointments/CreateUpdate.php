<?php

namespace App\Http\Livewire\Admin\Appointments;

use Carbon\Carbon;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $name, $description, $date;

  public function render()
  {
    return view('admin.appointments.createUpdate');
  }
}