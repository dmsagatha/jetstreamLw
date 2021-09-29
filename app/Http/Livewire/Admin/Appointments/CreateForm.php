<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\User;
use Livewire\Component;

class CreateForm extends Component
{
  public function render()
  {
    $clients = User::all();

    return view('admin.appointments.create-form', [
      'clients' => $clients,
    ]);
  }
}