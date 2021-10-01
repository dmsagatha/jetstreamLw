<?php

namespace App\Http\Livewire\Admin\Books;

use App\Models\Book;
use Livewire\Component;

class CreateUpdate extends Component
{
  public $state = [];
  public $book, $bookId;

  public function mount(Book $book)
  {
    dd($book);
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

  public function updated($propertyName)
  {
    // wire:model.debounce.50 - Bitfumes - 8 Laravel Livewire Real Time Validatio
    $this->validateOnly($propertyName);
  }

  /* public $book = null;
  public $name, $author, $pages;
  
  protected $listeners = [
    'showModal' => 'openModal',
    'showModalNewUser' => 'openModalNew',
  ];

  public function render()
  {
    return view('admin.books.create-update');
  }

  public function openModal(Book $book)
  {
    $this->book   = $book;
    $this->name   = $book->name;
    $this->author = $book->author;
    $this->pages  = $book->pages;
  } */
}