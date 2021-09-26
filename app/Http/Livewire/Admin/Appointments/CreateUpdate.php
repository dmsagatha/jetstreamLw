<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $appointmentsId, $name, $description, $date;

  public function render()
  {
    return view('admin.appointments.createUpdate');
  }

  public function rules()
  {
    return [
      'name' => 'required|string|min:4|unique:appointments,name,' . $this->appointmentsId,
      'date' => 'required',
      'description' => 'required',
    ];
  }

  public function save()
  {
    $this->validate();

    Appointment::create([
      'name' => $this->name,
      'description' => $this->description,
      'date' => $this->date,
    ]);

    sleep(2);
    $this->reset();
      
    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');

    return redirect()->route('appointments');
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
}
