<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\Component;

class CreateUpdate extends Component
{
  // public $state = [];
  public $book, $bookId;

  public $action;
  public $button;

  public function mount()
  {
    if (!$this->book && $this->bookId) {
      $this->book = Book::find($this->bookId);
    }

    // $this->button = create_button($this->action, "User");
  }

  public function render()
  {
    return view('admin.books.create-update');
  }

  public function rules()
  {
    return [
      'book.name'   => 'required|string|min:4|unique:books,name,' . $this->bookId,
      'book.author' => 'required',
      'book.pages'  => 'required',
    ];
  }

  public function save()
  {
    $this->validate();

    if (!is_null($this->bookId)) {
      $this->book->save();
      $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');
    } else {
      Book::create($this->book);
      $this->emit('alertCreate', 'Registro creado satisfactoriamente.');
      $this->reset('book');
    }   

    return redirect()->route('books.index');
  }

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validation
    $this->validateOnly($propertyName);
  }
}