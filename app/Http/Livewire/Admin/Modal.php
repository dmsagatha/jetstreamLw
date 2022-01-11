<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Modal extends Component
{
  public $showModal = '';

  /**
   * Escuchar los métodos que se están ejecutando
   */
  protected $listeners = ['showModal' => 'openModal'];
  
  public function render()
  {
    return view('admin.live-modal');
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