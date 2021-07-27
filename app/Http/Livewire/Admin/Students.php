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

  public $studentId ;

  // Almacenar todos los ID's que se van seleccionando para eliminar
  public $checked = [];

  public function render()
  {
    return view('admin.students.students', [
      'students' => Student::with(['lesson', 'section'])->paginate($this->perPage),
      'lessons'  => Lesson::all(),
    ]);
  }

  /** Eliminar todos los registros seleccionados */
  public function deleteRecords()
  {
    Student::whereKey($this->checked)->delete();
    $this->checked = [];

    session()->flash('info', 'Los registros seleccionados fueron eliminados con éxito');
  }

  /** Eliminar todos los registros seleccionados */
  public function deleteSingleRecord($studentId)
  {
    $students = Student::findOrFail($studentId);
    $students->delete();

    session()->flash('info', 'El registro fue eliminado con éxito');
  }
}