<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Http\Requests\RequestCreateUpdateUser;
use Livewire\Component;

class Create extends Component
{
  public $showModal = 'hidden';
  public $name;
  public $email;
  public $role;
  public $user = null;

  /**
   * Escuchar los métodos que se están ejecutando
   */
  protected $listeners = [
    'showModal' => 'openModal'
  ];
  
  public function render()
  {
    return view('admin.users.create');
  }

  public function update()
  {
    $requestUser = new RequestCreateUpdateUser();

    $values = $this->validate($requestUser->rules(), $requestUser->messages());

    $this->user->update($values);

    $this->emit('usersListUpdate');
    $this->reset();
  }

  public function openModal(User $user)
  {
    // Poner de forma global
    $this->user = $user;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->role = $user->role;

    $this->showModal = '';
  }

  public function updated($propertyName)
  {
    $requestUser = new RequestCreateUpdateUser();

    $this->validateOnly($propertyName, $requestUser->rules(), $requestUser->messages());
  }

  public function closeModal()
  {
    $this->reset();
  }
}