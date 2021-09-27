<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateUpdate extends Component
{
  // public $appointment, $appointmentId, $name, $description, $date;
  public $appointment, $appointmentId;

  public $action;
  public $button;

  public function render()
  {
    return view('admin.appointments.createUpdate');
  }

  public function rules()
  {
    return [
      'appointment.name' => 'required|string|min:4|unique:appointments,name,' . $this->appointmentId,
      'appointment.date' => 'required',
      'appointment.description' => 'required',
    ];
  }

  public function save()
  {
    $this->validate();

    /* Appointment::create([
      'name' => $this->name,
      'date' => $this->date,
      'description' => $this->description,
    ]); */
    Appointment::create($this->appointment);

    sleep(2);
    $this->reset('appointment');
      
    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');

    return redirect()->route('appointments');
  }

  /* public function mount($appointment)
  {
		$this->appointment = $appointment;
  } */

  public function mount()
  {
    if (!$this->appointment && $this->appointmentId) {
      $this->appointment = Appointment::find($this->appointmentId);
    }

    // $this->button = create_button($this->action, "User");
  }

  public function update()
  {
    $this->validate();
    $this->appointment->update($this->appointment->toArray());

    sleep(2);
    $this->reset();
      
    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    return redirect()->route('appointments');





    /* $this->resetErrorBag();
    $this->validate();

    Appointment::query()
      ->where('id', $this->appointmentId)
      ->update([
        'name' => $this->appointment->name,
        'date' => $this->appointment->date,
        'description' => $this->appointment->description,
      ]);

    sleep(2);
    $this->reset();
      
    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.'); */
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}
