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

    $this->removeImage($this->user->profile_photo_path);

    if ($values['profile_photo_path']) {
      $profile = ['profile_photo_path' => $this->loadImage($values['profile_photo_path'])];
      $values = array_merge($values, $profile);
    }

    
    $this->user->update($values);

    // $this->emit('usersListUpdate');
    $this->emitTo('admin.users.user-table', 'render');
    $this->closeModal();
  }

  public function store()
  {
    $requestUser = new RequestCreateUpdateUser();

    $values = $this->validate($requestUser->rules($this->user), $requestUser->messages());
    
    $user = new User;
    $user->fill($values);

    if ($values['profile_photo_path']) {
      $user->profile_photo_path = $this->loadImage($values['profile_photo_path']);
    }
    $user->password = bcrypt($values['password']);
    $user->save();
    
    // $this->emit('usersListUpdate');
    $this->emitTo('admin.users.user-table', 'render');
    $this->closeModal();
  }

  private function loadImage(TemporaryUploadedFile $image)
  {
    $extension = $image->getClientOriginalExtension();
    $location  = Storage::disk('public')->put('images', $image);

    return $location;
  }

  private function removeImage($profile_photo_path)
  {
    if (!$profile_photo_path) {
      return;
    }

    if (Storage::disk('public')->exists($profile_photo_path)) {
      Storage::disk('public')->delete($profile_photo_path);
    }
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