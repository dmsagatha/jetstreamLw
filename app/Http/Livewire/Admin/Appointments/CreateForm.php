<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class CreateForm extends Component
{
  public $state = [];

  public function render()
  {
    $clients = User::all();

    return view('admin.appointments.create-form', [
      'clients' => $clients,
    ]);
  }

  public function createAppointment()
  {
    // dd($this->state);

    Appointment::create($this->state);

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    return redirect()->route('appointments');
  }
}