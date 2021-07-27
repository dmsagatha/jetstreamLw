<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lesson;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
  use WithPagination;
  public $perPage = '10';

  public function render()
  {
    return view('admin.students.students', [
      'students' => Student::paginate($this->perPage),
      'lessons'  => Lesson::all(),
      'lessons'  => Lesson::all(),
    ]);
  }
}