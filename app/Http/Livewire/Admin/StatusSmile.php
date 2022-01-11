<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusSmile extends Component
{
  public $status;
  
  public function render()
  {
    return view('admin.status-smile');
  }
}