<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class UserTable extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '5';
  public $sortField = 'id';
  public $sortAsc   = true;
  public $userRole  = '';

  public $showModal = 'hidden';

  /**
   * Escuchar el evento que va a actualizar la tabla
   */
  protected $listeners = [
    'usersListUpdate' => 'render',
    'deleteUserList'  => 'deleteUser'
  ];

  public function render()
  {
    $users = User::where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->role($this->userRole)
                    ->paginate($this->perPage);

    return view('admin.users.user-table', compact('users'));
  }

  /**
   * Ejecutar solo cuando se cambie el valor de $search
   */
  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function sortBy($field)
  {
    /* Si el campo esta activo, reversar el ordenamiento,
    de lo contrario configurar la dirección a 'true' */
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function clearPage()
  {
    $this->reset();
  }

  /**
   * Mostrar el modal para crear y actualizar los usuarios
   */
  public function showModal(User $user)
  {
    if ($user->name) {
      $this->emit('showModal', $user);
    } else {
      $this->emit('showModalNewUser');
    }
  }

  public function deleteUser(User $user)
  {
    $user->delete();

    $this->emit('deleteUser', $user);
  }
}