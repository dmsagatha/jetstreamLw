<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class UserTable extends Component
{
  use WithPagination;
  
  public function render()
  {
    return view('admin.users.user-table', [
      'users' => User::paginate(5)
    ]);
  }
}