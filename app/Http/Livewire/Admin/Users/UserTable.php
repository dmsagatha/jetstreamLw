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

  public function render()
  {
    return view('admin.users.user-table', [
      'users' => User::where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->paginate($this->perPage)
    ]);
  }
}