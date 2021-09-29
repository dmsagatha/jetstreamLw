<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateForm extends Component
{
  public $state = [
    'status' => 'Scheduled',
  ];

  public $appointmentId;

  public function render()
  {
    $clients = User::all();

    return view('admin.appointments.create-form', [
      'clients' => $clients,
    ]);
  }

  public function rules()
  {
    return [
      'state.name'  => 'required|string|min:4|unique:appointments,name,' . $this->appointmentId,
      'state.user_id'     => 'required',
      'state.date'        => 'required',
      'state.description' => 'required',
      'state.status'      => 'required|in:Scheduled,Closed',
    ];
  }

  protected $messages = [
    'state.name.required'        => 'El campo nombre es obligatorio',
    'state.user_id.required'     => 'El campo usuario es obligatorio.',
    'state.date.required'        => 'El campo fecha es obligatorio.',
    'state.description.required' => 'El campo descripción es obligatorio.',
    'state.status.required'      => 'El campo estado es obligatorio.',
  ];

  public function createAppointment()
  {
    // dd($this->state);
    
    /* Validator::make(
      $this->state,
      [
        'name' => [
          'required', 'string', 'min:4',
          Rule::unique('appointments')->ignore($this->appointmentId)
        ],
        'user_id'     => 'required',
        'date'        => 'required',
        'description' => 'required',
        'status'      => 'required|in:Scheduled,Closed',
      ],
      [
        'user_id.required' => 'El usuario es requerido.'
      ]
    )->validate(); */

    $this->validate();

    Appointment::create($this->state);

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    return redirect()->route('appointments');
  }

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validatio
    $this->validateOnly($propertyName);
  }
}