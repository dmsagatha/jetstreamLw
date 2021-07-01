<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RequestCreateUpdateUser;

class Create extends Component
{
  use WithFileUploads;

  public $showModal = 'hidden';

  public $user = null;
  public $name, $email, $role, $password, $password_confirmation;
  public $profile_photo_path = null;

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

    $profile = ['profile_photo_path' => $this->loadImage($values['profile_photo_path'])];
    $values = array_merge($values, $profile);
    
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
    $user->profile_photo_path = $this->loadImage($values['profile_photo_path']);
    $user->password = bcrypt($values['password']);
    $user->save();
    
    $this->emit('usersListUpdate');
    $this->closeModal();
  }

  private function loadImage(TemporaryUploadedFile $image)
  {
    $extension = $image->getClientOriginalExtension();
    $location  = Storage::disk('public')->put('images', $image);

    return $location;
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