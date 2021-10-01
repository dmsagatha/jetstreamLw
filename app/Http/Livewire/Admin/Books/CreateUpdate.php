<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $state = [];
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
      'state.name'   => 'required|string|min:4|unique:books,name,' . $this->bookId,
      'state.author' => 'required',
      'state.pages'  => 'required',
    ];
  }

  protected $messages = [
    'state.name.required'   => 'El nombre es obligatorio.',
    'state.name.unique'     => 'El nombre ya ha sido registrado',
    'state.author.required' => 'El autor es obligatorio.',
    'state.pages.required'  => 'El número de páginas es obligatorio.',
  ];

  public function createBook()
  {
    $this->validate();

    Book::create($this->state);

    $this->emit('alertCreate', 'Registro creado satisfactoriamente.');

    return redirect()->route('books.index');
  }

  public function updateBook()
  {
    $this->resetErrorBag();
    $this->validate();

    Book::query()
      ->where('id', $this->bookId)
      ->update([
        "name"   => $this->book->name,
        "author" => $this->book->author,
        "pages"  => $this->book->pages,
      ]);

    $this->emit('saved');

    $this->emit('alertCreate', 'Registro actualizado satisfactoriamente.');

    return redirect()->route('books.index');
  }

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validatio
    $this->validateOnly($propertyName);
  }
}