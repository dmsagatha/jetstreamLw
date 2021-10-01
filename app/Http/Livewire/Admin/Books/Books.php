<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\WithPagination;
use Livewire\Component;

class Books extends Component
{
  use WithPagination;

  public $search    = '';
  public $perPage   = '25';
  public $sortField = 'id';
  public $sortAsc   = true;
  public $readyToLoad = false;

  protected $listeners = [
    'deleteConfirmed' => 'deleteRegister',
  ];

  public $idBeingRemoved = null;

  public function render()
  {
    return view('admin.books.index', [
      'books' => Book::search(trim($this->search))
          ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
          ->paginate($this->perPage),
    ]);
  }

  public function confirmRemoval($bookId)
  {
    $this->idBeingRemoved = $bookId;

    $this->dispatchBrowserEvent('show-delete-confirmation');
  }

  public function deleteRegister()
  {
    $book = Book::findOrFail($this->idBeingRemoved);

    $book->delete();

    $this->dispatchBrowserEvent('deleted', ['message' => 'Registro eliminado satisfactoriamente!']);
  }
  
  public function loadRecords()
  {
    $this->readyToLoad = true;
  }

  public function clearPage()
  {
    $this->resetPage();
    $this->reset();
  }

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }
}