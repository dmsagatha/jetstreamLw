<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\User;
use Livewire\Component;

class CreateForm extends Component
{
  public $name, $users;

  public function render()
  {
    $users = User::all();

    return view('admin.appointments.create-form', [
      'users' => $users,
    ]);
  }
}