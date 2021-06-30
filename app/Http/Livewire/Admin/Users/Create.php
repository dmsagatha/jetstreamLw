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
  public $password, $password_confirmation;
  public $user = null;
  public $action = '';
  public $method;

  /**
   * Escuchar los métodos que se están ejecutando
   */
  protected $listeners = [
    'showModal' => 'openModal',
    'showModalNewUser' => 'openModalNew',
  ];
  
  public function render()
  {
    return view('admin.users.create');
  }

  public function update()
  {
    $requestUser = new RequestCreateUpdateUser();

    $values = $this->validate($requestUser->rules($this->user), $requestUser->messages());

    $this->user->update($values);

    $this->emit('usersListUpdate');    
    $this->closeModal();
  }

  public function store()
  {
    $requestUser = new RequestCreateUpdateUser();

    $values = $this->validate($requestUser->rules($this->user), $requestUser->messages());

    $user = new User;
    $user->fill($values);
    $user->password = bcrypt($values['password']);
    $user->save();
    
    $this->closeModal();
  }

  public function openModal(User $user)
  {
    // $user Poner de forma global
    $this->user = $user;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->role = $user->role;

    $this->action = 'Actualizar';
    $this->method = 'update';

    $this->showModal = '';
  }

  public function openModalNew()
  {
    $this->user = null;
    $this->action = 'Crear';
    $this->method = 'store';

    $this->showModal = '';
  }

  public function updated($propertyName)
  {
    $requestUser = new RequestCreateUpdateUser();

    $this->validateOnly($propertyName, $requestUser->rules($this->user), $requestUser->messages());
  }

  public function closeModal()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset();
  }
}