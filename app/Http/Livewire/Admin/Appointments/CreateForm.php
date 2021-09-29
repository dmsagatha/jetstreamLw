<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateForm extends Component
{
  public $state = [
    'status' => 'Programado',
    'order_position' => 0,
  ];

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
    
    Validator::make(
      $this->state,
      [
        'user_id'     => 'required',
        'name'        => 'required',
        'date'        => 'required',
        'description' => 'required',
        'status'      => 'required|in:Programado,Cerrado',
      ],
      [
        'user_id.required' => 'El usuario es requerido.'
      ]
    )->validate();

    Appointment::create($this->state);

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    return redirect()->route('appointments');
  }
}