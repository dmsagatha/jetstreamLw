<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class Create extends Component
{
  public $showModal = '';

  /**
   * Escuchar los métodos que se están ejecutando
   */
  protected $listeners = ['showModal' => 'openModal'];
  
  public function render()
  {
    return view('admin.users.create');
  }

  public function openModal($user)
  {
    $this->showModal = '';
  }

  public function closeModal()
  {
    $this->showModal = 'hidden';
  }
}