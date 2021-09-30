<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;

class UpdateForm extends Component
{
  public $state = [];

  public $appointment, $appointmentId;

  public function mount(Appointment $appointment)
  {
    // dd($appointment);

    $this->state = $appointment->toArray();

    $this->appointment = $appointment;
  }

  public function render()
  {
    $clients = User::all();

    return view('admin.appointments.update-form', [
      'clients' => $clients,
    ]);
  }

  public function rules()
  {
    return [
      'state.name'        => 'required|string|min:4',
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

  public function updateAppointment()
  {
    $this->validate();
    
		$this->appointment->update($this->state);


    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');

    return redirect()->route('appointments');
  }

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validatio
    $this->validateOnly($propertyName);
  }
}